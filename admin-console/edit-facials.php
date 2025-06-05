<?php // edit-facials.php – Admin interface for managing facial treatments
session_start();
require_once "../../database.php";
require_once('layout/header.php');  // Include the header
require_once('layout/navbar.php');  // Include the navbar
$conn = getDatabaseConnection();
$head_title = "Admin Panel | Edit Facials";
// ──────────────────────────────────────────────
// Handle AJAX deletions first, before any redirects
// ──────────────────────────────────────────────
if (isset($_GET['ajax_action'])) {
    header('Content-Type: application/json');
    // Clean any buffered output to avoid extra content in response
    if (ob_get_length()) {
        ob_clean();
    }
    
    $response = ['status' => 'error', 'message' => 'Unknown action'];
    $action = $_GET['ajax_action'];  // Expected: 'delete_facial_option'
    
    if ($action === 'delete_facial_option') {
        $id = intval($_GET['id']);
        // Delete from the facial_options table
        $delete_sql = "DELETE FROM facial_options WHERE id='$id'";
        if (mysqli_query($conn, $delete_sql)) {
            $response = ['status' => 'success', 'message' => 'Option deleted', 'id' => $id];
        } else {
            $response = ['status' => 'error', 'message' => mysqli_error($conn)];
        }
    }

    if ($action === 'delete_facial') {
        $id = intval($_GET['id']);
        
        // First, delete the associated options:
        $delete_options_sql = "DELETE FROM facial_options WHERE facial_id='$id'";
        mysqli_query($conn, $delete_options_sql);
        
        // Then delete the facial record:
        $delete_facial_sql = "DELETE FROM facials WHERE id='$id'";
        if (mysqli_query($conn, $delete_facial_sql)) {
            $response = ['status' => 'success', 'message' => 'Facial and associated options deleted', 'id' => $id];
        } else {
            $response = ['status' => 'error', 'message' => mysqli_error($conn)];
        }
    }
    if ($action === 'delete_addon') {
        $id = intval($_GET['id']);
        $delete_sql = "DELETE FROM facial_add_ons WHERE id='$id'";

        if (mysqli_query($conn, $delete_sql)) {
            $response = ['status' => 'success', 'message' => 'Add-on deleted', 'id' => $id];
        } else {
            $response = ['status' => 'error', 'message' => mysqli_error($conn)];
        }
    }
    if ($action === 'delete_addon_option') {
        $id = intval($_GET['id']);
        $delete_sql = "DELETE FROM facial_add_on_options WHERE id='$id'";
        if (mysqli_query($conn, $delete_sql)) {
            $response = ['status' => 'success', 'message' => 'Add‑on option deleted', 'id' => $id];
        } else {
            $response = ['status' => 'error', 'message' => mysqli_error($conn)];
        }
    }
    
    echo json_encode($response);
    exit;
}
// ==================
// Process Facial Updates (incl. Options)
// ==================
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_facials'])) {

    // 1) UPDATE each facial’s main fields
    foreach ($_POST['facials'] as $facialId => $data) {
        $facialId   = (int) $facialId;
        $name        = mysqli_real_escape_string($conn, $data['name']);
        $price       = mysqli_real_escape_string($conn, $data['price']);
        $duration    = mysqli_real_escape_string($conn, $data['duration']);
        $description = mysqli_real_escape_string($conn, $data['description']);
        $section     = mysqli_real_escape_string($conn, $data['section']);
        
        $update_sql = "
            UPDATE facials 
               SET name        = '$name',
                   price       = '$price',
                   duration    = '$duration',
                   description = '$description',
                   section     = '$section'
             WHERE id = $facialId
        ";
        mysqli_query($conn, $update_sql);
    }

    // 2) If the form included option updates, process them
    if (isset($_POST['update_facial_options'])) {

        // 2a) UPDATE all EXISTING options
        if (isset($_POST['facial_options_existing']) && is_array($_POST['facial_options_existing'])) {
            foreach ($_POST['facial_options_existing'] as $optionId => $optionData) {
                $optionId = (int) $optionId;
                $title    = mysqli_real_escape_string($conn, trim($optionData['option_title']));
                $desc     = mysqli_real_escape_string($conn, trim($optionData['option_description']));

                // Only update if title is not empty (you could optionally also check desc)
                if ($title !== '') {
                    $stmt = $conn->prepare("
                        UPDATE facial_options
                           SET option_title       = ?,
                               option_description = ?
                         WHERE id = ?
                    ");
                    $stmt->bind_param("ssi", $title, $desc, $optionId);
                    $stmt->execute();
                    $stmt->close();
                }
            }
        }

        // 2b) INSERT any NEW option per facial
        if (isset($_POST['facial_options_new']) && is_array($_POST['facial_options_new'])) {
            foreach ($_POST['facial_options_new'] as $facialId => $newOption) {
                $facialId = (int) $facialId;
                $title    = mysqli_real_escape_string($conn, trim($newOption['title']));
                $desc     = mysqli_real_escape_string($conn, trim($newOption['description']));

                // Only insert if the “New Option Title” isn’t blank
                if ($title !== '') {
                    $stmt = $conn->prepare("
                        INSERT INTO facial_options (facial_id, option_title, option_description)
                        VALUES (?, ?, ?)
                    ");
                    $stmt->bind_param("iss", $facialId, $title, $desc);
                    $stmt->execute();
                    $stmt->close();
                }
            }
        }
    }

    // 3) Redirect back (so the page reloads with updated data)
    header("Location: edit-facials.php");
    exit;
}


// ==================
// Process New Facial Submission
// ==================
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['new_facial'])) {
    $name        = mysqli_real_escape_string($conn, $_POST['name']);
    $price       = mysqli_real_escape_string($conn, $_POST['price']);
    $duration    = mysqli_real_escape_string($conn, $_POST['duration']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $section     = mysqli_real_escape_string($conn, $_POST['section']);
    
    $insert_sql = "INSERT INTO facials (name, price, duration, description, section)
                   VALUES ('$name', '$price', '$duration', '$description', '$section')";
    mysqli_query($conn, $insert_sql);
    header("Location: edit-facials.php");
    exit;
}
// Save EXISTING options
if (isset($_POST['facial_options_existing'])) {
    foreach ($_POST['facial_options_existing'] as $optionId => $optionData) {
        $optionId = (int) $optionId;
        $title = trim($optionData['option_title']);
        $desc = trim($optionData['option_description']);

        // Only update if title is not empty
        if ($title !== '') {
            $stmt = $conn->prepare("UPDATE facial_options SET option_title = ?, option_description = ? WHERE id = ?");
            $stmt->bind_param("ssi", $title, $desc, $optionId);
            $stmt->execute();
            $stmt->close();
        }
    }
}

// Save NEW options
if (isset($_POST['facial_options_new'])) {
    foreach ($_POST['facial_options_new'] as $facialId => $newOption) {
        $facialId = (int) $facialId;
        $title = trim($newOption['title']);
        $desc = trim($newOption['description']);

        if ($title !== '') {
            $stmt = $conn->prepare("INSERT INTO facial_options (facial_id, option_title, option_description) VALUES (?, ?, ?)");
            $stmt->bind_param("iss", $facialId, $title, $desc);
            $stmt->execute();
            $stmt->close();
        }
    }
}



// ==================
// Process Add-On Updates / New Add-On Insertion
// ==================
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_addons'])) {
    // Update existing add-ons:
    foreach ($_POST['addons'] as $addon_id => $data) {
        if ($addon_id !== 'new') {  // existing add-on
            $name = mysqli_real_escape_string($conn, $data['name']);
            $description = mysqli_real_escape_string($conn, $data['description']);
            $price = mysqli_real_escape_string($conn, $data['price']);
            $sql = "UPDATE facial_add_ons 
                    SET name='$name', description='$description', price='$price'
                    WHERE id='$addon_id'";
            mysqli_query($conn, $sql);
        }
    }
    // Insert new add-on if provided:
    if (isset($_POST['addons']['new'])) {
        $new = $_POST['addons']['new'];
        if (!empty($new['name']) && !empty($new['description']) && !empty($new['price'])) {
            $name = mysqli_real_escape_string($conn, $new['name']);
            $description = mysqli_real_escape_string($conn, $new['description']);
            $price = mysqli_real_escape_string($conn, $new['price']);
            $sql = "INSERT INTO facial_add_ons (name, description, price)
                    VALUES ('$name', '$description', '$price')";
            mysqli_query($conn, $sql);
        }
    }
    if (isset($_POST['update_add_on_options'])) {
    // Update existing add-on options:
        foreach ($_POST['add_on_options_existing'] as $option_id => $data) {
            $option_id = (int) $option_id;
            $description = mysqli_real_escape_string($conn, trim($data['description']));
            if ($description !== '') {
                $stmt = $conn->prepare("UPDATE facial_add_on_options SET option_text = ? WHERE id = ?");
                $stmt->bind_param("si", $description, $option_id);
                $stmt->execute();
                $stmt->close();
            }
        }
        // Insert new add-on options:
        if (isset($_POST['facial_add_on_options_new']) && is_array($_POST['facial_add_on_options_new'])) {
            foreach ($_POST['facial_add_on_options_new'] as $addon_id => $newOption) {
                $addon_id = (int) $addon_id;
                $option_text = mysqli_real_escape_string($conn, trim($newOption['option_text']));
                if ($option_text !== '') {
                    $stmt = $conn->prepare("INSERT INTO facial_add_on_options (add_on_id, option_text) VALUES (?, ?)");
                    $stmt->bind_param("is", $addon_id, $option_text);
                    $stmt->execute();
                    $stmt->close();
                }
            }
        }

    }
    header("Location: edit-facials.php");
    exit;
}
// ==================
// Process Add-On Updates / New Add-On Insertion
// ==================




// ==================
// Retrieve Data
// ==================

// Get all facials ordered by section & price (ascending)
$facials_sql = "SELECT * FROM facials ORDER BY id ASC";
$result = mysqli_query($conn, $facials_sql);
$facials = [];
while ($row = mysqli_fetch_assoc($result)) {
    $facials[] = $row;
}
// Retrieve facial options grouped by facial_id
$facial_options = [];
$options_sql = "SELECT * FROM facial_options ORDER BY facial_id ASC, id ASC";
$result = mysqli_query($conn, $options_sql);
while ($row = mysqli_fetch_assoc($result)) {
    $facial_options[$row['facial_id']][] = $row;
}

// Retrieve facial add‑ons (stand‑alone add‑ons) ordered by price (or any order you need)
$addons_sql = "SELECT * FROM facial_add_ons ORDER BY price ASC";
$result = mysqli_query($conn, $addons_sql);
$addons = [];
while ($row = mysqli_fetch_assoc($result)) {
    $addons[] = $row;
}

// Retrieve add‑on options grouped by add_on_id
$add_on_options = [];
$options_sql = "SELECT * FROM facial_add_on_options ORDER BY add_on_id ASC, id ASC";
$result = mysqli_query($conn, $options_sql);
while ($row = mysqli_fetch_assoc($result)) {
    $add_on_options[$row['add_on_id']][] = $row;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Admin Panel | Edit Facials & Add‑Ons</title>
  <style>
      body { font-family: Arial, sans-serif; padding: 20px; }
      table { border-collapse: collapse; width: 100%; margin-bottom: 20px; }
      th, td { border: 1px solid #ccc; padding: 8px; vertical-align: top; }
      input[type="text"], textarea, select { width: 100%; box-sizing: border-box; }
      textarea { resize: vertical; }
      .section-header { background: #eee; padding: 10px; margin: 20px 0 10px; }
      .action-links a { margin-right: 10px; text-decoration: none; color: #0066cc; cursor: pointer; }
      /* Make the description field wider and more visible */
      .facial-description { min-width: 300px; }
  </style>
</head>
<body>
  <h1>Admin - Manage Facials and Add-Ons</h1>
  
  <!-- 1. Edit Existing Facials -->
  <h2>Edit Facials</h2>
  <form method="post" action="edit-facials.php">
    <input type="hidden" name="update_facials" value="1">
    <input type="hidden" name="update_facial_options" value="1">
    <table class="table table-striped custom-striped">
      <thead>
        <tr>
          <th>ID</th>
          <th>Facial Name</th>
          <th>Price ($)</th>
          <th>Duration</th>
          <th>Description</th>
          <th>Section</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($facials as $facial): ?>
          <tr id="facial-row-<?php echo $facial['id']; ?>">
            <td><?php echo htmlspecialchars($facial['id']); ?></td>
            <td>
              <input type="text" name="facials[<?php echo $facial['id']; ?>][name]" value="<?php echo htmlspecialchars($facial['name']); ?>">
            </td>
            <td>
              <input type="text" name="facials[<?php echo $facial['id']; ?>][price]" value="<?php echo htmlspecialchars($facial['price']); ?>">
            </td>
            <td>
              <input type="text" name="facials[<?php echo $facial['id']; ?>][duration]" value="<?php echo htmlspecialchars($facial['duration']); ?>">
            </td>
            <td>
              <textarea class="facial-description" name="facials[<?php echo $facial['id']; ?>][description]" rows="5"><?php echo htmlspecialchars($facial['description']); ?></textarea>
            </td>
            <td>
              <select name="facials[<?php echo $facial['id']; ?>][section]">
                <option value="Basic Facials" <?php if($facial['section'] === "Basic Facials") echo "selected"; ?>>Basic Facials</option>
                <option value="Extended Facials" <?php if($facial['section'] === "Extended Facials") echo "selected"; ?>>Extended Facials</option>
              </select>
            </td>
            <td class="action-links">
              <button class="delete-facial btn btn-danger" data-id="<?php echo $facial['id']; ?>">Delete Facial</button>
            </td>
          </tr>
          <!-- Display Facial Options for this facial -->
          <tr class="options-table-row">
            <td colspan="7">
              <div class="options-header">Options for <?php echo htmlspecialchars($facial['name']); ?></div>
              <table class="options-table">
                <thead>
                  <tr>
                    <th>Option ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                  $options = isset($facial_options[$facial['id']]) ? $facial_options[$facial['id']] : [];
                  foreach ($options as $option):
                ?>
                  <tr id="facial-option-row-<?php echo $option['id']; ?>">
                    <td><?php echo htmlspecialchars($option['id']); ?></td>
                    <td>
                      <input type="text" name="facial_options_existing[<?php echo $option['id']; ?>][option_title]" value="<?php echo htmlspecialchars($option['option_title']); ?>">
                    </td>
                    <td>
                      <textarea name="facial_options_existing[<?php echo $option['id']; ?>][option_description]" rows="2"><?php echo htmlspecialchars($option['option_description']); ?></textarea>
                    </td>
                    <td>
                    <button type="button" class="delete-facial-option btn btn-outline-danger" data-id="<?php echo $option['id']; ?>">Delete Option</button>
                    </td>
                  </tr>
                <?php endforeach; ?>
               <!-- New Option Row for this facial -->
                <tr class="new-option">
                  <td>New</td>
                  <td>
                    <input type="text" name="facial_options_new[<?php echo $facial['id']; ?>][title]" placeholder="New Option Title">
                  </td>
                  <td>
                    <textarea name="facial_options_new[<?php echo $facial['id']; ?>][description]" rows="2" placeholder="New Option Description"></textarea>
                  </td>
                  <td></td>
                </tr>
                </tbody>
              </table>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <button type="submit" class="btn btn-outline-success" >Save Facial Changes</button>
  </form>
  
  <!-- 2. Add New Facial -->
   </br>
  <h2>Add New Facial</h2>
  <form method="post" action="edit-facials.php">
    <input type="hidden" name="new_facial" value="1">
    <input type="hidden" name="update_facial_options" value="1">
    <table>
      <tr>
        <td><label for="new_name">Facial Name:</label></td>
        <td><input type="text" id="new_name" name="name" required></td>
      </tr>
      <tr>
        <td><label for="new_price">Price ($):</label></td>
        <td><input type="text" id="new_price" name="price" required></td>
      </tr>
      <tr>
        <td><label for="new_duration">Duration:</label></td>
        <td><input type="text" id="new_duration" name="duration" required></td>
      </tr>
      <tr>
        <td><label for="new_description">Description:</label></td>
        <td>
          <textarea id="new_description" name="description" rows="5" required></textarea>
        </td>
      </tr>
      <tr>
        <td><label for="new_section">Section:</label></td>
        <td>
          <select id="new_section" name="section" required>
            <option value="Basic Facials">Basic Facials</option>
            <option value="Extended Facials">Extended Facials</option>
          </select>
        </td>
      </tr>
    </table>
    <button type="submit" class="btn btn-outline-success">Add Facial</button>
  </form>
  
  <hr>
  
    <h2>Edit/Add Stand-Alone Add‑Ons and Their Options</h2>
  <form method="post" action="edit-facials.php">
    <!-- This hidden input is used by your processing code for add‑on updates -->
    <input type="hidden" name="update_addons" value="1">
    <input type="hidden" name="update_add_on_options" value="1">
    <table class="table table-striped custom-striped">
      <thead>
        <tr>
          <th>Add‑On ID</th>
          <th>Name</th>
          <th>Description</th>
          <th>Price ($)</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($addons as $addon): 
                $addon_id = $addon['id'];
        ?>
        <!-- Add-On Row -->
        <tr id="addon-row-<?php echo $addon_id; ?>">
          <td><?php echo htmlspecialchars($addon['id']); ?></td>
          <td>
            <input type="text" name="addons[<?php echo $addon_id; ?>][name]" value="<?php echo htmlspecialchars($addon['name']); ?>">
          </td>
          <td>
            <textarea name="addons[<?php echo $addon_id; ?>][description]" rows="3"><?php echo htmlspecialchars($addon['description']); ?></textarea>
          </td>
          <td>
            <input type="text" name="addons[<?php echo $addon_id; ?>][price]" value="<?php echo htmlspecialchars($addon['price']); ?>">
          </td>
          <td>
            <button type="button" class="delete-addon btn btn-danger" data-id="<?php echo $addon_id; ?>">Delete Add On</button>
          </td>
        </tr>
        <!-- Nested Row for Add-On Options -->
        <?php if(isset($add_on_options[$addon_id]) && !empty($add_on_options[$addon_id])): ?>
        <tr>
          <td colspan="5">
            <h5>Options for Add‑On: <?php echo htmlspecialchars($addon['name']); ?></h5>
            <table class="nested-table">
              <thead>
                <tr>
                  <th>Option ID</th>
                  <th>Description</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach($add_on_options[$addon_id] as $option): ?>
                <tr id="addon-option-row-<?php echo $option['id']; ?>">
                  <td><?php echo htmlspecialchars($option['id']); ?></td>
                  <td>
                    <textarea name="add_on_options_existing[<?php echo $option['id']; ?>][description]" rows="2"><?php echo htmlspecialchars($option['option_text']); ?></textarea>
                  </td>
                  <td>
                    <button class="delete-addon-option btn btn-outline-danger" data-id="<?php echo $option['id']; ?>">Delete option</button>
                  </td>
                </tr>
                <?php endforeach; ?>
                <!-- New Option Row for This Add-On -->
                <tr class="new-option">
                  <td>New option</td>        
                  <td>              
                    <input type="text" name="facial_add_on_options_new[<?php echo $addon_id; ?>][option_text]" placeholder="New Option Text">
                  </td>
                  <td></td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
        <?php else: ?>
        <!-- If no options exist for this add-on, still show a row to add a new option -->
        <tr>
          <td colspan="5">
            <h5>Options for Add‑On: <?php echo htmlspecialchars($addon['name']); ?></h5>
            <table class="nested-table">
              <tbody>
                <tr class="new-option">
                  <td>New option</td>
                  <td>
                    <input type="text" name="facial_add_on_options_new[<?php echo $addon_id; ?>][option_text]" placeholder="New Option Text">
                  </td>
                  <td></td>
                </tr>
              </tbody>
            </table>
          </td>
        </tr>
        <?php endif; ?>
        <?php endforeach; ?>
        <!-- New Add-On Row -->
        <tr class="new-option">
          <td>New Facial Add-on</td>
          <td>
            <input type="text" name="addons[new][name]" placeholder="New Add-On Name">
          </td>
          <td>
            <textarea name="addons[new][description]" rows="3" placeholder="New Add-On Description"></textarea>
          </td>
          <td>
            <input type="text" name="addons[new][price]" placeholder="New Add-On Price">
          </td>
          <td></td>
        </tr>
      </tbody>
    </table>
    <button type="submit" class="btn btn-outline-success">Save Add‑On Changes</button>
  </form>
  
  <!-- JavaScript for AJAX deletion -->
  <script>
    // Attach AJAX deletion for add‑on options
    // JavaScript for AJAX deletion (add this to your existing script)
    document.querySelectorAll('.delete-addon-option').forEach(function(button) {
        button.addEventListener('click', function(e) {
            e.preventDefault();
            var id = this.getAttribute('data-id');
            if (!confirm('Are you sure you want to delete this add‑on option?')) return;
            
            fetch('edit-facials.php?ajax_action=delete_addon_option&id=' + id)
                .then(response => response.json())
                .then(data => {
                    if (data.status === 'success') {
                        // Remove the option row from the table
                        var row = document.getElementById('addon-option-row-' + id);
                        if (row) row.remove();
                    } else {
                        alert('Deletion failed: ' + data.message);
                    }
                })
                .catch(error => alert('Error: ' + error));
        });
    });

    // Delete Facial via AJAX (including its nested options row)
    document.querySelectorAll('.delete-facial').forEach(function(link) {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            var id = this.getAttribute('data-id');
            if (!confirm('Are you sure you want to delete this facial?')) return;
            fetch('edit-facials.php?ajax_action=delete_facial&id=' + id)
            .then(response => response.json())
            .then(data => {
                if (data.status === 'success') {
                // Remove the facial row
                var facialRow = document.getElementById('facial-row-' + id);
                if (facialRow) {
                    // Option 1: If you know the next row is the options container,
                    // remove it if it has the designated class.
                    var nextRow = facialRow.nextElementSibling;
                    if (nextRow && nextRow.classList.contains('options-table-row')) {
                    nextRow.remove();
                    }
                    // Finally, remove the main facial row.
                    facialRow.remove();
                }
                } else {
                alert('Deletion failed: ' + data.message);
                }
            })
            .catch(error => alert('Error: ' + error));
        });
    });

    // Delete Add‑On via AJAX
    document.querySelectorAll('.delete-addon').forEach(function(link) {
      link.addEventListener('click', function(e) {
        e.preventDefault();
        var id = this.getAttribute('data-id');
        if (!confirm('Are you sure you want to delete this add‑on?')) return;
        fetch('edit-facials.php?ajax_action=delete_addon&id=' + id)
          .then(response => response.json())
          .then(data => {
            if (data.status === 'success') {
              var row = document.getElementById('addon-row-' + id);
              if (row) row.remove();
            } else {
              alert('Deletion failed: ' + data.message);
            }
          })
          .catch(error => alert('Error: ' + error));
      });
    });

// AJAX deletion for facial options
document.querySelectorAll('.delete-facial-option').forEach(function(link) {
  link.addEventListener('click', function(e) {
    e.preventDefault();
    var id = this.getAttribute('data-id');
    if (!confirm('Are you sure you want to delete this option?')) return;
    fetch('edit-facials.php?ajax_action=delete_facial_option&id=' + id)
      .then(response => response.json())
      .then(data => {
        if (data.status === 'success') {
          var row = document.getElementById('facial-option-row-' + id);
          if (row) row.remove();
        } else {
          alert('Deletion failed: ' + data.message);
        }
      })
      .catch(error => alert('Error: ' + error));
  });
});


</script>
</body>
</html>

<style>
    .custom-striped {
  --bs-table-striped-bg: #e0afff; /* light yellow */
}
</style>