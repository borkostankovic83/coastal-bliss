<?php
session_start();
require_once "../../database.php";
require_once('layout/header.php');
require_once('layout/navbar.php');

$conn = getDatabaseConnection();
$head_title = "Admin | Edit Home Page";

/* -----------------------------
   LOAD HOME DATA
--------------------------------*/
$data = [];
$res = mysqli_query($conn, "
    SELECT `key`,`value`
    FROM site_content
    WHERE section='home'
");
while ($row = mysqli_fetch_assoc($res)) {
    $data[$row['key']] = $row['value'];
}

$hero_enabled = !empty($data['hero_enabled']);
$hero_images = !empty($data['hero_images'])
    ? json_decode($data['hero_images'], true)
    : [];

/* -----------------------------
   DELETE IMAGE
--------------------------------*/
if (isset($_POST['delete_image'])) {
    $img = $_POST['delete_image'];

    $hero_images = array_values(array_filter(
        $hero_images,
        fn($i) => $i !== $img
    ));

    @unlink($_SERVER['DOCUMENT_ROOT'] . $img);

    $json = mysqli_real_escape_string($conn, json_encode($hero_images));
    mysqli_query($conn, "
        UPDATE site_content
        SET value='$json'
        WHERE section='home' AND `key`='hero_images'
    ");

    header("Location: edit-homepage.php");
    exit;
}

/* -----------------------------
   SAVE ENABLE / DISABLE
--------------------------------*/
if (isset($_POST['save_home'])) {
    $enabled = isset($_POST['hero_enabled']) ? '1' : '0';

    mysqli_query($conn, "
        INSERT INTO site_content (section, `key`, `value`)
        VALUES ('home','hero_enabled','$enabled')
        ON DUPLICATE KEY UPDATE value='$enabled'
    ");
}

/* -----------------------------
   UPLOAD IMAGES (MAX 3)
--------------------------------*/
if (!empty($_FILES['hero_images']['name'][0])) {
    $uploadDir = $_SERVER['DOCUMENT_ROOT'] . "/images/uploads/home/";

    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }

    foreach ($_FILES['hero_images']['tmp_name'] as $i => $tmp) {
        if (count($hero_images) >= 5) break;

        if (!is_uploaded_file($tmp)) continue;

        $ext = pathinfo($_FILES['hero_images']['name'][$i], PATHINFO_EXTENSION);
        $name = uniqid('home_') . '.' . $ext;
        move_uploaded_file($tmp, $uploadDir . $name);

        $hero_images[] = "/images/uploads/home/" . $name;
    }

    $json = mysqli_real_escape_string($conn, json_encode($hero_images));
    mysqli_query($conn, "
        INSERT INTO site_content (section, `key`, `value`)
        VALUES ('home','hero_images','$json')
        ON DUPLICATE KEY UPDATE value='$json'
    ");

    header("Location: edit-homepage.php");
    exit;
}
?>

<div class="container my-4">
    <h2>Edit Home Page</h2>

    <form method="post" enctype="multipart/form-data">
        <div class="form-check mb-4">
            <input class="form-check-input"
                   type="checkbox"
                   name="hero_enabled"
                   value="1"
                   <?= $hero_enabled ? 'checked' : '' ?>>
            <label class="form-check-label">
                Show images on home page
            </label>
        </div>

        <div class="mb-4">
            <label class="form-label">
                Upload Images (max 5)
            </label>
            <input type="file"
                   class="form-control"
                   name="hero_images[]"
                   multiple
                   accept="image/*">
        </div>

        <?php if (!empty($hero_images)): ?>
            <div class="row mb-4">
                <?php foreach ($hero_images as $img): ?>
                    <div class="col-md-4 text-center mb-3">
                        <img src="<?= $img ?>" class="img-fluid rounded mb-2">
                        <button type="submit"
                                name="delete_image"
                                value="<?= htmlspecialchars($img) ?>"
                                class="btn btn-sm btn-danger">
                            Delete
                        </button>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>

        <button class="btn btn-primary" name="save_home">
            Save Home Page
        </button>
    </form>
</div>

