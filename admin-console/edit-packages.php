<?php
session_start();
require_once "../../database.php";
require_once('layout/header.php');
require_once('layout/navbar.php');
$conn = getDatabaseConnection();
$head_title = "Admin Panel | Edit Packages";

/*******************
 * PROCESS REQUESTS
 *******************/

// Delete a package (and its options)
if (isset($_GET['delete_package'])) {
    $del_id = intval($_GET['delete_package']);
    $stmt = $conn->prepare("DELETE FROM service_packages WHERE id = ?");
    $stmt->bind_param("i", $del_id);
    $stmt->execute();
    $stmt->close();
    $conn->query("DELETE FROM service_package_options WHERE package_id = $del_id");
    header("Location: edit-packages.php");
    exit();
}

// Delete a package option
if (isset($_GET['delete_option'])) {
    $del_id = intval($_GET['delete_option']);
    $stmt = $conn->prepare("DELETE FROM service_package_options WHERE id = ?");
    $stmt->bind_param("i", $del_id);
    $stmt->execute();
    $stmt->close();
    header("Location: edit-packages.php");
    exit();
}

// Update packages and options
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update_packages'])) {
    if (isset($_POST['packages']) && is_array($_POST['packages'])) {
        foreach ($_POST['packages'] as $pkg_id => $data) {
            $name = trim($data['name']);
            $desc = trim($data['description']);
            $sort = intval($data['sort_order']);
            $stmt = $conn->prepare("UPDATE service_packages SET name = ?, description = ?, sort_order = ? WHERE id = ?");
            $stmt->bind_param("ssii", $name, $desc, $sort, $pkg_id);
            $stmt->execute();
            $stmt->close();
        }
    }
    if (isset($_POST['options']) && is_array($_POST['options'])) {
        foreach ($_POST['options'] as $opt_id => $odata) {
            $title = trim($odata['title']);
            $price = floatval($odata['price']);
            $stmt = $conn->prepare("UPDATE service_package_options SET option_title = ?, option_price = ? WHERE id = ?");
            $stmt->bind_param("sdi", $title, $price, $opt_id);
            $stmt->execute();
            $stmt->close();
        }
    }
    // Insert new options for existing packages
    if (isset($_POST['new_options']) && is_array($_POST['new_options'])) {
        foreach ($_POST['new_options'] as $pkg_id => $optionGroup) {
            if (is_array($optionGroup)) {
                foreach ($optionGroup as $option) {
                    if (!empty(trim($option['title']))) {
                        $title = trim($option['title']);
                        $price = isset($option['price']) ? floatval($option['price']) : 0;
                        $stmt = $conn->prepare("INSERT INTO service_package_options (package_id, option_title, option_price) VALUES (?, ?, ?)");
                        $stmt->bind_param("isd", $pkg_id, $title, $price);
                        $stmt->execute();
                        $stmt->close();
                    }
                }
            }
        }
    }
    header("Location: edit-packages.php");
    exit();
}

// Add new package
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_package'])) {
    $newName = trim($_POST['new_package_name']);
    $newDesc = trim($_POST['new_package_description']);
    $newSort = intval($_POST['new_package_sort']);
    $stmt = $conn->prepare("INSERT INTO service_packages (name, description, sort_order) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $newName, $newDesc, $newSort);
    $stmt->execute();
    $new_pkg_id = $stmt->insert_id;
    $stmt->close();

    // Insert new options for the new package
    if (isset($_POST['new_option_title']) && is_array($_POST['new_option_title'])) {
        $titles = $_POST['new_option_title'];
        $prices = $_POST['new_option_price'];
        for ($i = 0; $i < count($titles); $i++) {
            $title = trim($titles[$i]);
            $price = floatval($prices[$i]);
            if ($title !== '') {
                $stmt = $conn->prepare("INSERT INTO service_package_options (package_id, option_title, option_price) VALUES (?, ?, ?)");
                $stmt->bind_param("isd", $new_pkg_id, $title, $price);
                $stmt->execute();
                $stmt->close();
            }
        }
    }
    header("Location: edit-packages.php");
    exit();
}

/*******************
 * RETRIEVE DATA
 *******************/

// Fetch all packages
$sql = "SELECT * FROM service_packages ORDER BY sort_order, id";
$result = mysqli_query($conn, $sql);
$packages = [];
while ($row = mysqli_fetch_assoc($result)) {
    $packages[$row['id']] = $row;
}

// Fetch all options
$options = [];
if ($packages) {
    $ids = implode(',', array_keys($packages));
    $opt_sql = "SELECT * FROM service_package_options WHERE package_id IN ($ids) ORDER BY id";
    $opt_res = mysqli_query($conn, $opt_sql);
    while ($opt = mysqli_fetch_assoc($opt_res)) {
        $options[$opt['package_id']][] = $opt;
    }
}
?>

<div class="container-fluid my-5">
    <h1>Edit Packages</h1>
    <!-- Update Packages Form -->
    <form method="post" action="edit-packages.php">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th style="width: 5%;">ID</th>
                    <th style="width: 15%;">Sort Order</th>
                    <th style="width: 20%;">Package Name</th>
                    <th style="width: 30%;">Description</th>
                    <th style="width: 25%;">Options (Title - Price)</th>
                    <th style="width: 5%;">Delete</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($packages as $pkg): ?>
                <tr>
                    <td><?php echo $pkg['id']; ?></td>
                    <td>
                        <input type="number" name="packages[<?php echo $pkg['id']; ?>][sort_order]" value="<?php echo $pkg['sort_order']; ?>" class="form-control" min="0">
                    </td>
                    <td>
                        <input type="text" name="packages[<?php echo $pkg['id']; ?>][name]" value="<?php echo htmlspecialchars($pkg['name']); ?>" class="form-control">
                    </td>
                    <td>
                        <textarea name="packages[<?php echo $pkg['id']; ?>][description]" class="form-control" rows="4"><?php echo htmlspecialchars($pkg['description']); ?></textarea>
                    </td>
                    <td>
                        <?php
                        $pkgOptions = isset($options[$pkg['id']]) ? $options[$pkg['id']] : [];
                        ?>
                        <?php if (!empty($pkgOptions)): ?>
                        <table class="table table-sm">
                            <?php foreach ($pkgOptions as $opt): ?>
                            <tr>
                                <td>
                                    <input type="text" name="options[<?php echo $opt['id']; ?>][title]" value="<?php echo htmlspecialchars($opt['option_title']); ?>" class="form-control">
                                </td>
                                <td>
                                    <input type="number" step="0.01" name="options[<?php echo $opt['id']; ?>][price]" value="<?php echo number_format($opt['option_price'],2); ?>" class="form-control">
                                </td>
                                <td>
                                    <a href="edit-packages.php?delete_option=<?php echo $opt['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Delete this option?');">Delete</a>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </table>
                        <?php endif; ?>
                        <button type="button" class="btn btn-secondary btn-sm" onclick="addOption(<?php echo $pkg['id']; ?>)">Add Option</button>
                        <div id="new-option-<?php echo $pkg['id']; ?>"></div>
                    </td>
                    <td>
                        <a href="edit-packages.php?delete_package=<?php echo $pkg['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Delete this package and its options?');">Delete</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <button type="submit" name="update_packages" class="btn btn-primary">Update Packages</button>
    </form>

    <hr class="my-5">

    <h2>Add New Package</h2>
    <form method="post" action="edit-packages.php" class="mb-5">
        <div class="mb-3">
            <label for="newPackageName" class="form-label">Package Name</label>
            <input type="text" name="new_package_name" id="newPackageName" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="newPackageDescription" class="form-label">Description</label>
            <textarea name="new_package_description" id="newPackageDescription" class="form-control" rows="4" required></textarea>
        </div>
        <div class="mb-3">
            <label for="newPackageSort" class="form-label">Sort Order</label>
            <input type="number" name="new_package_sort" id="newPackageSort" class="form-control" value="0" min="0">
        </div>
        <h5>New Options</h5>
        <div id="newOptionsContainer">
            <div class="row mb-2">
                <div class="col-md-7">
                    <input type="text" name="new_option_title[]" class="form-control" placeholder="Option Title">
                </div>
                <div class="col-md-5">
                    <input type="number" step="0.01" name="new_option_price[]" class="form-control" placeholder="Price">
                </div>
            </div>
        </div>
        <button type="button" class="btn btn-secondary mb-3" onclick="addNewOption()">Add Another Option</button>
        <br>
        <button type="submit" name="add_package" class="btn btn-success">Add New Package</button>
    </form>
</div>

<script>
function addOption(pkgId) {
    let container = document.getElementById('new-option-' + pkgId);
    let html = '<div class="row mb-2">' +
               '<div class="col-md-7"><input type="text" name="new_options[' + pkgId + '][][title]" class="form-control" placeholder="Option Title"></div>' +
               '<div class="col-md-5"><input type="number" step="0.01" name="new_options[' + pkgId + '][][price]" class="form-control" placeholder="Price"></div>' +
               '</div>';
    container.insertAdjacentHTML('beforeend', html);
}
function addNewOption() {
    let container = document.getElementById('newOptionsContainer');
    let html = '<div class="row mb-2">' +
               '<div class="col-md-7"><input type="text" name="new_option_title[]" class="form-control" placeholder="Option Title"></div>' +
               '<div class="col-md-5"><input type="number" step="0.01" name="new_option_price[]" class="form-control" placeholder="Price"></div>' +
               '</div>';
    container.insertAdjacentHTML('beforeend', html);
}
</script>