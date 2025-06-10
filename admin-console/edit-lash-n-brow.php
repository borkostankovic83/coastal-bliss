<?php
session_start();
require_once "../../database.php";
require_once('layout/header.php');
require_once('layout/navbar.php');
$conn = getDatabaseConnection();
$head_title = "Admin Panel | Edit Lash & Brow";

// =====================
// HANDLE CATEGORY CRUD
// =====================
if (isset($_POST['save_categories'])) {
    // Update existing categories
    if (isset($_POST['categories']) && is_array($_POST['categories'])) {
        foreach ($_POST['categories'] as $cat_id => $cat) {
            $name = mysqli_real_escape_string($conn, trim($cat['name']));
            $intro = mysqli_real_escape_string($conn, trim($cat['intro']));
            $order = (int)$cat['sort_order'];
            if ($name !== '') {
                mysqli_query($conn, "UPDATE lash_brow_categories SET name='$name', intro='$intro', sort_order=$order WHERE id=".(int)$cat_id);
            }
        }
    }
    // Add new category
    if (!empty($_POST['new_category']['name'])) {
        $name = mysqli_real_escape_string($conn, trim($_POST['new_category']['name']));
        $intro = mysqli_real_escape_string($conn, trim($_POST['new_category']['intro']));
        $order = (int)$_POST['new_category']['sort_order'];
        mysqli_query($conn, "INSERT INTO lash_brow_categories (name, intro, sort_order) VALUES ('$name', '$intro', $order)");
    }
    header("Location: edit-lash-n-brow.php?msg=cat_updated");
    exit;
}

// Delete category
if (isset($_POST['delete_category'])) {
    $cat_id = (int)$_POST['delete_category'];
    mysqli_query($conn, "DELETE FROM lash_brow_categories WHERE id=$cat_id");
    header("Location: edit-lash-n-brow.php?msg=cat_deleted");
    exit;
}

// =====================
// HANDLE SERVICE CRUD
// =====================
if (isset($_POST['save_services'])) {
    // Update existing services
    if (isset($_POST['services']) && is_array($_POST['services'])) {
        foreach ($_POST['services'] as $id => $svc) {
            $cat_id = (int)$svc['category_id'];
            $name = mysqli_real_escape_string($conn, trim($svc['name']));
            $duration = mysqli_real_escape_string($conn, trim($svc['duration']));
            $desc = mysqli_real_escape_string($conn, trim($svc['description']));
            $order = (int)$svc['sort_order'];
            mysqli_query($conn, "UPDATE lash_brow_services SET category_id=$cat_id, name='$name', duration='$duration', description='$desc', sort_order=$order WHERE id=".(int)$id);
        }
    }
    // Add new service
    if (!empty($_POST['new']['name']) && !empty($_POST['new']['category_id'])) {
        $cat_id = (int)$_POST['new']['category_id'];
        $name = mysqli_real_escape_string($conn, trim($_POST['new']['name']));
        $duration = mysqli_real_escape_string($conn, trim($_POST['new']['duration']));
        $desc = mysqli_real_escape_string($conn, trim($_POST['new']['description']));
        $order = (int)$_POST['new']['sort_order'];
        mysqli_query($conn, "INSERT INTO lash_brow_services (category_id, name, duration, description, sort_order) VALUES ($cat_id, '$name', '$duration', '$desc', $order)");
    }
    header("Location: edit-lash-n-brow.php?msg=svc_updated");
    exit;
}

// Delete service
if (isset($_POST['delete_service'])) {
    $id = (int)$_POST['delete_service'];
    mysqli_query($conn, "DELETE FROM lash_brow_services WHERE id=$id");
    header("Location: edit-lash-n-brow.php?msg=svc_deleted");
    exit;
}

// =====================
// FETCH DATA
// =====================
$categories = [];
$cat_result = mysqli_query($conn, "SELECT * FROM lash_brow_categories ORDER BY sort_order, name");
while ($row = mysqli_fetch_assoc($cat_result)) {
    $categories[$row['id']] = $row;
}

$services = [];
$result = mysqli_query($conn, "SELECT * FROM lash_brow_services ORDER BY category_id, sort_order");
while ($row = mysqli_fetch_assoc($result)) {
    $services[] = $row;
}

// =====================
// SUCCESS MESSAGES
// =====================
if (isset($_GET['msg'])) {
    $messages = [
        'cat_updated' => 'Categories updated successfully.',
        'cat_deleted' => 'Category deleted successfully.',
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
    <h2 class="mb-3">Edit Lash & Brow Categories</h2>
    <form method="post" action="edit-lash-n-brow.php">
        <table class="table table-bordered align-middle">
            <thead class="table-light">
                <tr>
                    <th>Name</th>
                    <th>Intro</th>
                    <th>Order</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($categories as $cat): ?>
                <tr>
                    <td>
                        <input type="text" class="form-control" name="categories[<?= $cat['id'] ?>][name]" value="<?= htmlspecialchars($cat['name']) ?>">
                    </td>
                    <td>
                        <input type="text" class="form-control" name="categories[<?= $cat['id'] ?>][intro]" value="<?= htmlspecialchars($cat['intro']) ?>">
                    </td>
                    <td style="width:100px;">
                        <input type="number" class="form-control" name="categories[<?= $cat['id'] ?>][sort_order]" value="<?= $cat['sort_order'] ?>">
                    </td>
                    <td style="width:120px;">
                        <form method="post" action="edit-lash-n-brow.php" style="display:inline;">
                            <button type="submit" class="btn btn-danger btn-sm"
                                name="delete_category" value="<?= $cat['id'] ?>"
                                onclick="return confirm('Are you sure you want to delete the category: <?= htmlspecialchars(addslashes($cat['name'])) ?>?')">
                                <i class="bi bi-trash"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
                <tr>
                    <td>
                        <input type="text" class="form-control" name="new_category[name]" placeholder="New category">
                    </td>
                    <td>
                        <input type="text" class="form-control" name="new_category[intro]" placeholder="Intro">
                    </td>
                    <td>
                        <input type="number" class="form-control" name="new_category[sort_order]" value="0">
                    </td>
                    <td></td>
                </tr>
            </tbody>
        </table>
        <button type="submit" class="btn btn-primary" name="save_categories" value="1">
            <i class="bi bi-save"></i> Save Categories
        </button>
    </form>

    <hr class="my-5">

    <h2 class="mb-3">Edit Lash & Brow Services</h2>
    <form method="post" action="edit-lash-n-brow.php">
        <table class="table table-bordered align-middle">
            <thead class="table-light">
                <tr>
                    <th>Category</th>
                    <th>Name</th>
                    <th>Duration/Price</th>
                    <th>Description</th>
                    <th>Order</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($services as $service): ?>
                <tr>
                    <td>
                        <select name="services[<?= $service['id'] ?>][category_id]" class="form-select">
                            <?php foreach ($categories as $cat_id => $cat): ?>
                                <option value="<?= $cat_id ?>" <?= $service['category_id'] == $cat_id ? 'selected' : '' ?>>
                                    <?= htmlspecialchars($cat['name']) ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                    <td>
                        <input type="text" class="form-control" name="services[<?= $service['id'] ?>][name]" value="<?= htmlspecialchars($service['name']) ?>">
                    </td>
                    <td>
                        <input type="text" class="form-control" name="services[<?= $service['id'] ?>][duration]" value="<?= htmlspecialchars($service['duration']) ?>">
                    </td>
                    <td>
                        <input type="text" class="form-control" name="services[<?= $service['id'] ?>][description]" value="<?= htmlspecialchars($service['description']) ?>">
                    </td>
                    <td style="width:100px;">
                        <input type="number" class="form-control" name="services[<?= $service['id'] ?>][sort_order]" value="<?= $service['sort_order'] ?>">
                    </td>
                    <td style="width:120px;">
                        <form method="post" action="edit-lash-n-brow.php" style="display:inline;">
                            <button type="submit" class="btn btn-danger btn-sm"
                                name="delete_service" value="<?= $service['id'] ?>"
                                onclick="return confirm('Are you sure you want to delete the service: <?= htmlspecialchars(addslashes($service['name'])) ?>?')">
                                <i class="bi bi-trash"></i> Delete
                            </button>
                        </form>
                    </td>
                </tr>
                <?php endforeach; ?>
                <tr>
                    <td>
                        <select name="new[category_id]" class="form-select">
                            <option value="">-- Select --</option>
                            <?php foreach ($categories as $cat_id => $cat): ?>
                                <option value="<?= $cat_id ?>"><?= htmlspecialchars($cat['name']) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </td>
                    <td>
                        <input type="text" class="form-control" name="new[name]" placeholder="New service">
                    </td>
                    <td>
                        <input type="text" class="form-control" name="new[duration]" placeholder="Duration/Price">
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
