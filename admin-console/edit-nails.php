<?php
session_start();
require_once "../../database.php";
require_once('layout/header.php');
require_once('layout/navbar.php');
$conn = getDatabaseConnection();
$head_title = "Admin Panel | Edit Nails";

// =====================
// HANDLE SECTION CRUD
// =====================
if (isset($_POST['save_sections'])) {
    // Update existing sections
    if (isset($_POST['sections']) && is_array($_POST['sections'])) {
        foreach ($_POST['sections'] as $sec_id => $sec) {
            $name = mysqli_real_escape_string($conn, trim($sec['name']));
            $desc = mysqli_real_escape_string($conn, trim($sec['description']));
            $order = (int)$sec['sort_order'];
            $is_addons = !empty($sec['is_addons']) ? 1 : 0;
            if ($name !== '') {
                mysqli_query($conn, "UPDATE nail_service_sections SET name='$name', description='$desc', sort_order=$order, is_addons=$is_addons WHERE id=".(int)$sec_id);
            }
        }
    }
    // Add new section
    if (!empty($_POST['new_section']['name'])) {
        $name = mysqli_real_escape_string($conn, trim($_POST['new_section']['name']));
        $desc = mysqli_real_escape_string($conn, trim($_POST['new_section']['description']));
        $order = (int)$_POST['new_section']['sort_order'];
        $is_addons = !empty($_POST['new_section']['is_addons']) ? 1 : 0;
        mysqli_query($conn, "INSERT INTO nail_service_sections (name, description, sort_order, is_addons) VALUES ('$name', '$desc', $order, $is_addons)");
    }
    header("Location: edit-nails.php?msg=sec_updated");
    exit;
}

// Delete section
if (isset($_POST['delete_section'])) {
    $sec_id = (int)$_POST['delete_section'];
    mysqli_query($conn, "DELETE FROM nail_service_sections WHERE id=$sec_id");
    header("Location: edit-nails.php?msg=sec_deleted");
    exit;
}

// =====================
// HANDLE SERVICE CRUD
// =====================
if (isset($_POST['save_services'])) {
    // Update existing services
    if (isset($_POST['services']) && is_array($_POST['services'])) {
        foreach ($_POST['services'] as $id => $svc) {
            $sec_id = (int)$svc['section_id'];
            $title = mysqli_real_escape_string($conn, trim($svc['title']));
            $price = mysqli_real_escape_string($conn, trim($svc['price']));
            $desc = mysqli_real_escape_string($conn, trim($svc['description']));
            $order = (int)$svc['sort_order'];
            mysqli_query($conn, "UPDATE nail_services SET section_id=$sec_id, title='$title', price='$price', description='$desc', sort_order=$order WHERE id=".(int)$id);
        }
    }
    // Add new service
    if (!empty($_POST['new']['title']) && !empty($_POST['new']['section_id'])) {
        $sec_id = (int)$_POST['new']['section_id'];
        $title = mysqli_real_escape_string($conn, trim($_POST['new']['title']));
        $price = mysqli_real_escape_string($conn, trim($_POST['new']['price']));
        $desc = mysqli_real_escape_string($conn, trim($_POST['new']['description']));
        $order = (int)$_POST['new']['sort_order'];
        mysqli_query($conn, "INSERT INTO nail_services (section_id, title, price, description, sort_order) VALUES ($sec_id, '$title', '$price', '$desc', $order)");
    }
    header("Location: edit-nails.php?msg=svc_updated");
    exit;
}

// Delete service
if (isset($_POST['delete_service'])) {
    $id = (int)$_POST['delete_service'];
    mysqli_query($conn, "DELETE FROM nail_services WHERE id=$id");
    header("Location: edit-nails.php?msg=svc_deleted");
    exit;
}

// =====================
// FETCH DATA
// =====================
$sections = [];
$sec_result = mysqli_query($conn, "SELECT * FROM nail_service_sections ORDER BY sort_order, name");
while ($row = mysqli_fetch_assoc($sec_result)) {
    $sections[$row['id']] = $row;
}

$services = [];
$result = mysqli_query($conn, "SELECT * FROM nail_services ORDER BY section_id, sort_order");
while ($row = mysqli_fetch_assoc($result)) {
    $services[] = $row;
}

// =====================
// SUCCESS MESSAGES
// =====================
if (isset($_GET['msg'])) {
    $messages = [
        'sec_updated' => 'Sections updated successfully.',
        'sec_deleted' => 'Section deleted successfully.',
        'svc_updated' => 'Services updated successfully.',
        'svc_deleted' => 'Service deleted successfully.',
    ];
    $msg_key = $_GET['msg'];
    if (isset($messages[$msg_key])) {
        echo '<div class="container my-4 alert alert-success alert-dismissible fade show" role="alert">'
            . htmlspecialchars($messages[$msg_key]) .
            '<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
    }
}
?>

<div class="container my-4">
    <h2 class="mb-3">Edit Nail Service Sections</h2>
    <form method="post" action="edit-nails.php">
        <table class="table table-bordered align-middle">
            <thead class="table-light">
                <tr>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Order</th>
                    <th>Add-on?</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($sections as $sec): ?>
                <tr>
                    <td>
                        <input type="text" class="form-control" name="sections[<?= $sec['id'] ?>][name]" value="<?= htmlspecialchars($sec['name']) ?>">
                    </td>
                    <td>
                        <input type="text" class="form-control" name="sections[<?= $sec['id'] ?>][description]" value="<?= htmlspecialchars($sec['description']) ?>">
                    </td>
                    <td style="width:100px;">
                        <input type="number" class="form-control" name="sections[<?= $sec['id'] ?>][sort_order]" value="<?= $sec['sort_order'] ?>">
                    </td>
                    <td style="width:80px; text-align:center;">
                        <input type="checkbox" name="sections[<?= $sec['id'] ?>][is_addons]" value="1" <?= !empty($sec['is_addons']) ? 'checked' : '' ?>>
                    </td>
                    <td style="width:120px;">
                        <form method="post" action="edit-nails.php" style="display:inline;">
                            <button type="submit" class="btn btn-danger btn-sm"
                                name="delete_section" value="<?= $sec['id'] ?>"
                                onclick="return confirm('Are you sure you want to delete the section: <?= htmlspecialchars(addslashes($sec['name'])) ?>?')">
                                <i class="bi bi-trash"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
                <tr>
                    <td>
                        <input type="text" class="form-control" name="new_section[name]" placeholder="New section">
                    </td>
                    <td>
                        <input type="text" class="form-control" name="new_section[description]" placeholder="Description">
                    </td>
                    <td>
                        <input type="number" class="form-control" name="new_section[sort_order]" value="0">
                    </td>
                    <td style="text-align:center;">
                        <input type="checkbox" name="new_section[is_addons]" value="1">
                    </td>
                    <td></td>
                </tr>
            </tbody>
        </table>
        <button type="submit" class="btn btn-primary" name="save_sections" value="1">
            <i class="bi bi-save"></i> Save Sections
        </button>
    </form>

    <hr class="my-5">

    <h2 class="mb-3">Edit Nail Services</h2>
    <form method="post" action="edit-nails.php">
        <table class="table table-bordered align-middle">
            <thead class="table-light">
                <tr>
                    <th>Section</th>
                    <th>Title</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Order</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($services as $service): ?>
                <tr>
                    <td>
                        <select name="services[<?= $service['id'] ?>][section_id]" class="form-select">
                            <?php foreach ($sections as $sec_id => $sec): ?>
                                <option value="<?= $sec_id ?>" <?= $service['section_id'] == $sec_id ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($sec['name']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                    <td>
                        <input type="text" class="form-control" name="services[<?= $service['id'] ?>][title]" value="<?= htmlspecialchars($service['title']) ?>">
                    </td>
                    <td>
                        <input type="text" class="form-control" name="services[<?= $service['id'] ?>][price]" value="<?= htmlspecialchars($service['price']) ?>">
                    </td>
                    <td>
                        <input type="text" class="form-control" name="services[<?= $service['id'] ?>][description]" value="<?= htmlspecialchars($service['description']) ?>">
                    </td>
                    <td style="width:100px;">
                        <input type="number" class="form-control" name="services[<?= $service['id'] ?>][sort_order]" value="<?= $service['sort_order'] ?>">
                    </td>
                    <td style="width:120px;">
                        <form method="post" action="edit-nails.php" style="display:inline;">
                            <button type="submit" class="btn btn-danger btn-sm"
                                name="delete_service" value="<?= $service['id'] ?>"
                                onclick="return confirm('Are you sure you want to delete the service: <?= htmlspecialchars(addslashes($service['title'])) ?>?')">
                                <i class="bi bi-trash"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
                <tr>
                    <td>
                        <select name="new[section_id]" class="form-select">
                            <option value="">-- Select --</option>
                            <?php foreach ($sections as $sec_id => $sec): ?>
                                <option value="<?= $sec_id ?>"><?= htmlspecialchars($sec['name']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                    <td>
                        <input type="text" class="form-control" name="new[title]" placeholder="New service">
                    </td>
                    <td>
                        <input type="text" class="form-control" name="new[price]" placeholder="Price">
                    </td>
                    <td>
                        <input type="text" class="form-control" name="new[description]" placeholder="Description">
                    </td>
                    <td>
                        <input type="number" class="form-control" name="new[sort_order]" value="0">
                    </td>
                    <td></td>
                </tr>
            </tbody>
        </table>
        <button type="submit" class="btn btn-primary" name="save_services" value="1">
            <i class="bi bi-save"></i> Save Services
        </button>
    </form>
</div>
