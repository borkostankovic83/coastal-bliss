<?php
session_start();
require_once "../../database.php";
require_once('layout/header.php');  // Include the header
require_once('layout/navbar.php');  // Include the navbar
$conn = getDatabaseConnection();

/*******************
 * PROCESS REQUESTS
 *******************/

// -- Delete a massage (which will cascade delete options)
if (isset($_GET['delete_massage'])) {
    $del_id = intval($_GET['delete_massage']);
    $stmt = $conn->prepare("DELETE FROM massages WHERE id = ?");
    $stmt->bind_param("i", $del_id);
    $stmt->execute();
    $stmt->close();
    header("Location: edit-massages.php");
    exit();
}

// -- Delete a massage option
if (isset($_GET['delete_option'])) {
    $del_id = intval($_GET['delete_option']);
    $stmt = $conn->prepare("DELETE FROM massage_options WHERE id = ?");
    $stmt->bind_param("i", $del_id);
    $stmt->execute();
    $stmt->close();
    header("Location: edit-massages.php");
    exit();
}

// -- Delete an add-on
if (isset($_GET['delete_addon'])) {
    $del_id = intval($_GET['delete_addon']);
    $stmt = $conn->prepare("DELETE FROM massage_add_ons WHERE id = ?");
    $stmt->bind_param("i", $del_id);
    $stmt->execute();
    $stmt->close();
    header("Location: edit-massages.php");
    exit();
}

// Process Massage Services Updates (both massage details and options)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_massages'])) {
    // Update existing massages (name & description)
    if (isset($_POST['massages']) && is_array($_POST['massages'])) {
        foreach ($_POST['massages'] as $massage_id => $data) {
            $name = trim($data['name']);
            $description = trim($data['description']);
            $stmt = $conn->prepare("UPDATE massages SET name = ?, description = ? WHERE id = ?");
            $stmt->bind_param("ssi", $name, $description, $massage_id);
            $stmt->execute();
            $stmt->close();
        }
    }
    
    // Update existing massage options
    if (isset($_POST['options']) && is_array($_POST['options'])) {
        foreach ($_POST['options'] as $option_id => $odata) {
            $duration = trim($odata['duration']);
            $price = floatval($odata['price']);
            $stmt = $conn->prepare("UPDATE massage_options SET duration = ?, price = ? WHERE id = ?");
            $stmt->bind_param("sdi", $duration, $price, $option_id);
            $stmt->execute();
            $stmt->close();
        }
    }
    
    // Insert new options for existing massages (new options added via dynamic fields)
    if (isset($_POST['new_options']) && is_array($_POST['new_options'])) {
        foreach ($_POST['new_options'] as $massage_id => $optionGroup) {
            if (is_array($optionGroup)) {
                foreach ($optionGroup as $option) {
                    // We only want to insert if duration is provided (non-empty)
                    if (!empty(trim($option['duration']))) {
                        $dur = trim($option['duration']);
                        $price = isset($option['price']) ? floatval($option['price']) : 0;
                        $stmt = $conn->prepare("INSERT INTO massage_options (massage_id, duration, price) VALUES (?, ?, ?)");
                        $stmt->bind_param("isd", $massage_id, $dur, $price);
                        $stmt->execute();
                        $stmt->close();
                    }
                }
            }
        }
    }
    
    header("Location: edit-massages.php");
    exit();
}

// Process new massage addition.
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_massage'])) {
    $newName = trim($_POST['new_massage_name']);
    $newDescription = trim($_POST['new_massage_description']);
    $newCategory = intval($_POST['new_massage_category']);
    
    $stmt = $conn->prepare("INSERT INTO massages (category_id, name, description) VALUES (?, ?, ?)");
    $stmt->bind_param("iss", $newCategory, $newName, $newDescription);
    $stmt->execute();
    $new_massage_id = $stmt->insert_id;
    $stmt->close();
    
    // Insert new options for the new massage.
    if (isset($_POST['new_option_duration']) && is_array($_POST['new_option_duration'])) {
        $durations = $_POST['new_option_duration'];
        $prices = $_POST['new_option_price'];
        for ($i = 0; $i < count($durations); $i++) {
            $dur = trim($durations[$i]);
            $pr = floatval($prices[$i]);
            $stmt = $conn->prepare("INSERT INTO massage_options (massage_id, duration, price) VALUES (?, ?, ?)");
            $stmt->bind_param("isd", $new_massage_id, $dur, $pr);
            $stmt->execute();
            $stmt->close();
        }
    }
    header("Location: edit-massages.php");
    exit();
}

// Process updates for Massage Add-Ons.
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_addons'])) {
    if (isset($_POST['addons']) && is_array($_POST['addons'])) {
        foreach ($_POST['addons'] as $id => $adata) {
            $name = trim($adata['name']);
            $price = floatval($adata['price']);
            $stmt = $conn->prepare("UPDATE massage_add_ons SET name = ?, price = ? WHERE id = ?");
            $stmt->bind_param("sdi", $name, $price, $id);
            $stmt->execute();
            $stmt->close();
        }
    }
    header("Location: edit-massages.php");
    exit();
}

// Process new add-on addition.
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['new_addon'])) {
    $newAddonName = trim($_POST['new_addon_name']);
    $newAddonPrice = floatval($_POST['new_addon_price']);
    $stmt = $conn->prepare("INSERT INTO massage_add_ons (name, price) VALUES (?, ?)");
    $stmt->bind_param("sd", $newAddonName, $newAddonPrice);
    $stmt->execute();
    $stmt->close();
    header("Location: edit-massages.php");
    exit();
}

/*******************
 * RETRIEVE DATA
 *******************/

// Fetch all massage services with their category information.
$sql = "
    SELECT m.id AS massage_id, m.name, m.description, m.category_id, mc.title AS category_title
    FROM massages m
    JOIN massage_categories mc ON m.category_id = mc.id
    ORDER BY mc.title, m.name
";
$result = mysqli_query($conn, $sql);
$massages = [];
while ($row = mysqli_fetch_assoc($result)) {
    $massages[$row['massage_id']] = $row;
}

// Fetch all massage options.
$sql = "SELECT * FROM massage_options ORDER BY massage_id, duration";
$result = mysqli_query($conn, $sql);
$options = [];
while ($row = mysqli_fetch_assoc($result)) {
    $options[] = $row;
}

// Fetch all categories (for new massage addition selection)
$sql = "SELECT id, title FROM massage_categories ORDER BY title";
$result = mysqli_query($conn, $sql);
$categoriesList = [];
while ($row = mysqli_fetch_assoc($result)) {
    $categoriesList[] = $row;
}

// Fetch all massage add-ons.
$sql = "SELECT * FROM massage_add_ons ORDER BY name";
$result = mysqli_query($conn, $sql);
$addons = [];
while ($row = mysqli_fetch_assoc($result)) {
    $addons[] = $row;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin - Edit Massage Services & Add-Ons</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container-fluid my-5">
    <h1>Edit Massage Services</h1>
    <!-- Massage Services Update Form -->
    <form method="post" action="edit-massages.php">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width: 2%;">ID</th>
                    <th style="width: 10%;">Category</th>
                    <th style="width: 15%;">Massage Name</th>
                    <th style="width: 40%;">Description</th> <!-- Wider -->
                    <th style="width: 27%;">Options (Duration - Price)</th>
                    <th style="width: 5%;">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($massages as $massage): ?>
                <tr>
                    <td><?php echo $massage['massage_id']; ?></td>
                    <td><?php echo htmlspecialchars($massage['category_title']); ?></td>
                    <td>
                        <input type="text" name="massages[<?php echo $massage['massage_id']; ?>][name]" value="<?php echo htmlspecialchars($massage['name']); ?>" class="form-control">
                    </td>
                    <!-- Increase the width of the description column -->
                    <td style="width: 40%;">
                        <textarea name="massages[<?php echo $massage['massage_id']; ?>][description]" class="form-control" rows="6" style="width: 100%;"><?php echo htmlspecialchars($massage['description']); ?></textarea>
                    </td>
                    <td>
                        <!-- Options code remains unchanged -->
                        <?php
                        $massageOptions = [];
                        foreach ($options as $opt) {
                            if ($opt['massage_id'] == $massage['massage_id']) {
                                $massageOptions[] = $opt;
                            }
                        }
                        ?>
                        <?php if (!empty($massageOptions)): ?>
                        <table class="table table-sm">
                            <?php foreach ($massageOptions as $opt): ?>
                            <tr>
                                <td style="width: 60%;">
                                    <input type="text" name="options[<?php echo $opt['id']; ?>][duration]" value="<?php echo htmlspecialchars($opt['duration']); ?>" class="form-control">
                                </td>
                                <td style="width: 30%;">
                                    <input type="number" step="0.01" name="options[<?php echo $opt['id']; ?>][price]" value="<?php echo number_format($opt['price'],2); ?>" class="form-control">
                                </td>
                                <td style="width: 10%;">
                                    <a href="edit-massages.php?delete_option=<?php echo $opt['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Delete this option?');">Delete</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </table>
                        <?php endif; ?>
                        <!-- Button to add a new option dynamically for this massage -->
                        <button type="button" class="btn btn-secondary btn-sm" onclick="addOption(<?php echo $massage['massage_id']; ?>)">Add Option</button>
                        <div id="new-option-<?php echo $massage['massage_id']; ?>"></div>
                    </td>
                    <td>
                        <a href="edit-massages.php?delete_massage=<?php echo $massage['massage_id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Delete this massage and its options?');">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>

        </table>
        <button type="submit" name="update_massages" class="btn btn-primary">Update Massages</button>
    </form>
    
    <hr class="my-5">
    
    <h2>Add New Massage Service</h2>
    <form method="post" action="edit-massages.php" class="mb-5">
        <div class="mb-3">
            <label for="newMassageCategory" class="form-label">Category</label>
            <select class="form-select" name="new_massage_category" id="newMassageCategory" required>
                <?php foreach ($categoriesList as $cat): ?>
                <option value="<?php echo $cat['id']; ?>"><?php echo htmlspecialchars($cat['title']); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="newMassageName" class="form-label">Massage Name</label>
            <input type="text" name="new_massage_name" id="newMassageName" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="newMassageDescription" class="form-label">Description</label>
            <textarea name="new_massage_description" id="newMassageDescription" class="form-control" rows="4" required></textarea>
        </div>
        <h5>New Options</h5>
        <div id="newOptionsContainer">
            <div class="row mb-2">
                <div class="col-md-6">
                    <input type="text" name="new_option_duration[]" class="form-control" placeholder="Duration (e.g., 60 min)">
                </div>
                <div class="col-md-4">
                    <input type="number" step="0.01" name="new_option_price[]" class="form-control" placeholder="Price">
                </div>
            </div>
        </div>
        <button type="button" class="btn btn-secondary mb-3" onclick="addNewOption()">Add Another Option</button>
        <br>
        <button type="submit" name="add_massage" class="btn btn-success">Add New Massage</button>
    </form>
    
    <hr class="my-5">
    
    <h1>Edit Massage Add-Ons</h1>
    <!-- Massage Add-Ons Form -->
    <form method="post" action="edit-massages.php">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Add-On Name</th>
                    <th>Price ($)</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($addons as $addon): ?>
                <tr>
                    <td><?php echo $addon['id']; ?></td>
                    <td>
                        <input type="text" name="addons[<?php echo $addon['id']; ?>][name]" value="<?php echo htmlspecialchars($addon['name']); ?>" class="form-control">
                    </td>
                    <td>
                        <input type="number" step="0.01" name="addons[<?php echo $addon['id']; ?>][price]" value="<?php echo number_format($addon['price'], 2); ?>" class="form-control">
                    </td>
                    <td>
                        <a href="edit-massages.php?delete_addon=<?php echo $addon['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this add-on?');">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <button type="submit" name="update_addons" class="btn btn-primary">Update Add-Ons</button>
    </form>
    
    <hr class="my-5">
    
    <h2>Add a New Add-On</h2>
    <form method="post" action="edit-massages.php" class="row g-3">
        <div class="col-md-6">
            <label for="newAddonName" class="form-label">Add-On Name</label>
            <input type="text" name="new_addon_name" id="newAddonName" class="form-control" required>
        </div>
        <div class="col-md-6">
            <label for="newAddonPrice" class="form-label">Price ($)</label>
            <input type="number" step="0.01" name="new_addon_price" id="newAddonPrice" class="form-control" required>
        </div>
        <div class="col-12">
            <button type="submit" name="new_addon" class="btn btn-success">Add New Add-On</button>
        </div>
    </form>
</div>

<script>
// Function to add a new option field for an existing massage
function addOption(massageId) {
    let container = document.getElementById('new-option-' + massageId);
    let html = '<div class="row mb-2">' +
               '<div class="col-md-6"><input type="text" name="new_options[' + massageId + '][][duration]" class="form-control" placeholder="Duration (e.g., 60 min)"></div>' +
               '<div class="col-md-4"><input type="number" step="0.01" name="new_options[' + massageId + '][][price]" class="form-control" placeholder="Price"></div>' +
               '<div class="col-md-2"><button type="button" class="btn btn-danger" onclick="this.parentElement.parentElement.remove()">Remove</button></div>' +
               '</div>';
    container.insertAdjacentHTML('beforeend', html);
}

// Function to add new option fields for the new massage addition
function addNewOption() {
    let container = document.getElementById('newOptionsContainer');
    let html = '<div class="row mb-2">' +
               '<div class="col-md-6"><input type="text" name="new_option_duration[]" class="form-control" placeholder="Duration (e.g., 60 min)"></div>' +
               '<div class="col-md-4"><input type="number" step="0.01" name="new_option_price[]" class="form-control" placeholder="Price"></div>' +
               '</div>';
    container.insertAdjacentHTML('beforeend', html);
}
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<style>
.wide-textarea {
    width: 100%;
    max-width: 800px; /* Adjust the max-width as needed */
}

</style>