<?php // edit-facials.php – Admin interface for managing facial treatments
session_start();
require_once "../../database.php";
require_once('layout/header.php');  // Include the header
require_once('layout/navbar.php');  // Include the navbar
$conn = getDatabaseConnection();
$head_title = "Admin Panel | Edit Facials";

// ----------------------
// AJAX Deletion Processing
// ----------------------
if (isset($_GET['ajax_action'])) {
    header('Content-Type: application/json'); // Ensure JSON format
    ob_clean(); // Clean any existing output before sending JSON response

    $response = ['status' => 'error', 'message' => 'Unknown action'];

    if ($_GET['ajax_action'] === 'delete_facial') {
        $id = intval($_GET['id']);
        $delete_sql = "DELETE FROM facials WHERE id='$id'";

        if (mysqli_query($conn, $delete_sql)) {
            $response = ['status' => 'success', 'message' => 'Facial deleted', 'id' => $id];
        } else {
            $response = ['status' => 'error', 'message' => mysqli_error($conn)];
        }
    }

    if ($_GET['ajax_action'] === 'delete_addon') {
        $id = intval($_GET['id']);
        $delete_sql = "DELETE FROM facial_add_ons WHERE id='$id'";

        if (mysqli_query($conn, $delete_sql)) {
            $response = ['status' => 'success', 'message' => 'Add-on deleted', 'id' => $id];
        } else {
            $response = ['status' => 'error', 'message' => mysqli_error($conn)];
        }
    }

    echo json_encode($response);
    exit;
}


// ==================
// Process Facial Updates
// ==================
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_facials'])) {
    foreach ($_POST['facials'] as $id => $data) {
        $name        = mysqli_real_escape_string($conn, $data['name']);
        $price       = mysqli_real_escape_string($conn, $data['price']);
        $duration    = mysqli_real_escape_string($conn, $data['duration']);
        $description = mysqli_real_escape_string($conn, $data['description']);
        $section     = mysqli_real_escape_string($conn, $data['section']);
        
        $update_sql = "UPDATE facials 
                       SET name='$name', price='$price', duration='$duration', 
                           description='$description', section='$section'
                       WHERE id='$id'";
        mysqli_query($conn, $update_sql);
    }
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
    header("Location: edit-facials.php");
    exit;
}

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

// Get all stand-alone add-ons ordered by price ascending.
$addons = [];
$addons_sql = "SELECT * FROM facial_add_ons ORDER BY id ASC";
$result = mysqli_query($conn, $addons_sql);
while ($row = mysqli_fetch_assoc($result)) {
    $addons[] = $row;
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
    <table>
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
              <button class="delete-facial btn btn-outline-danger" data-id="<?php echo $facial['id']; ?>">Delete Facial</button>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <button type="submit"  class="btn btn-outline-success" >Save Facial Changes</button>
  </form>
  
  <!-- 2. Add New Facial -->
   </br>
  <h2>Add New Facial</h2>
  <form method="post" action="edit-facials.php">
    <input type="hidden" name="new_facial" value="1">
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
  
  <!-- 3. Edit/Add Stand-Alone Add‑Ons -->
  <h2>Edit/Add Stand-Alone Add‑Ons</h2>
  <form method="post" action="edit-facials.php">
    <input type="hidden" name="update_addons" value="1">
    <table>
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
        <?php foreach($addons as $addon): ?>
        <tr id="addon-row-<?php echo $addon['id']; ?>">
          <td><?php echo htmlspecialchars($addon['id']); ?></td>
          <td>
            <input type="text" name="addons[<?php echo $addon['id']; ?>][name]" value="<?php echo htmlspecialchars($addon['name']); ?>">
          </td>
          <td>
            <textarea name="addons[<?php echo $addon['id']; ?>][description]" rows="3"><?php echo htmlspecialchars($addon['description']); ?></textarea>
          </td>
          <td>
            <input type="text" name="addons[<?php echo $addon['id']; ?>][price]" value="<?php echo htmlspecialchars($addon['price']); ?>">
          </td>
          <td>
            <button class="delete-addon btn btn-outline-danger" data-id="<?php echo $addon['id']; ?>">Delete Add On</button>
          </td>
        </tr>
        <?php endforeach; ?>
        <!-- New add‑on row -->
        <tr>
          <td>New</td>
          <td><input type="text" name="addons[new][name]" placeholder="New Add‑On Name"></td>
          <td><textarea name="addons[new][description]" rows="3" placeholder="New Add‑On Description"></textarea></td>
          <td><input type="text" name="addons[new][price]" placeholder="Price"></td>
          <td></td>
        </tr>
      </tbody>
    </table>
    <button type="submit"  class="btn btn-outline-success">Save Add‑On Changes</button>
  </form>
  
  <!-- JavaScript for AJAX deletion -->
  <script>
    // Delete Facial via AJAX
    document.querySelectorAll('.delete-facial').forEach(function(link) {
      link.addEventListener('click', function(e) {
        e.preventDefault();
        var id = this.getAttribute('data-id');
        if (!confirm('Are you sure you want to delete this facial?')) return;
        fetch('edit-facials.php?ajax_action=delete_facial&id=' + id)
          .then(response => response.json())
          .then(data => {
            if (data.status === 'success') {
              var row = document.getElementById('facial-row-' + id);
              if (row) row.remove();
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

    function deleteItem(type, id) {
    if (!confirm(`Are you sure you want to delete this ${type}?`)) return;

    fetch(`admin-edit-facials.php?ajax_action=delete_${type}&id=` + id)
        .then(response => response.text()) // Read response as text first
        .then(text => {
            try {
                const data = JSON.parse(text); // Try parsing JSON
                if (data.status === 'success') {
                    document.getElementById(`${type}-row-${id}`).remove();
                } else {
                    alert('Deletion failed: ' + data.message);
                }
            } catch (error) {
                console.error('Invalid JSON response:', text);
                alert('Error: Server returned invalid response.');
            }
        })
        .catch(error => alert('Error: ' + error));
}

  </script>
</body>
</html>
