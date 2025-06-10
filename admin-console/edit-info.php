<?php
session_start();
require_once "../../database.php";
require_once('layout/header.php');
require_once('layout/navbar.php');
$conn = getDatabaseConnection();
$head_title = "Admin Panel | Edit Site Info";

// Fetch all content
$content = [];
$res = mysqli_query($conn, "SELECT section, `key`, `value` FROM site_content");
while ($row = mysqli_fetch_assoc($res)) {
    $content[$row['section']][$row['key']] = $row['value'];
}

// Prepare open hours for editing
$open_hours = [];
if (!empty($content['footer']['open_hours'])) {
    $open_hours = json_decode($content['footer']['open_hours'], true);
}
$days = ['Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'];

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle open_hours as JSON
    if (isset($_POST['open_hours']) && is_array($_POST['open_hours'])) {
        $open_hours_json = json_encode($_POST['open_hours']);
        $esc_section = mysqli_real_escape_string($conn, 'footer');
        $esc_key = mysqli_real_escape_string($conn, 'open_hours');
        $esc_value = mysqli_real_escape_string($conn, $open_hours_json);
        $exists = mysqli_query($conn, "SELECT id FROM site_content WHERE section='$esc_section' AND `key`='$esc_key'");
        if (mysqli_num_rows($exists)) {
            mysqli_query($conn, "UPDATE site_content SET `value`='$esc_value' WHERE section='$esc_section' AND `key`='$esc_key'");
        } else {
            mysqli_query($conn, "INSERT INTO site_content (section, `key`, `value`) VALUES ('$esc_section', '$esc_key', '$esc_value')");
        }
        unset($_POST['open_hours']); // Prevent double handling
    }
    // Handle all other fields
    foreach ($_POST as $section => $fields) {
        foreach ($fields as $key => $value) {
            $esc_section = mysqli_real_escape_string($conn, $section);
            $esc_key = mysqli_real_escape_string($conn, $key);
            $esc_value = mysqli_real_escape_string($conn, $value);
            $exists = mysqli_query($conn, "SELECT id FROM site_content WHERE section='$esc_section' AND `key`='$esc_key'");
            if (mysqli_num_rows($exists)) {
                mysqli_query($conn, "UPDATE site_content SET `value`='$esc_value' WHERE section='$esc_section' AND `key`='$esc_key'");
            } else {
                mysqli_query($conn, "INSERT INTO site_content (section, `key`, `value`) VALUES ('$esc_section', '$esc_key', '$esc_value')");
            }
        }
    }
    header("Location: edit-info.php?msg=updated");
    exit;
}
?>

<div class="container my-4">
    <h2>Edit Site Info</h2>
    <?php if (isset($_GET['msg']) && $_GET['msg'] === 'updated'): ?>
        <div class="alert alert-success">Info updated!</div>
    <?php endif; ?>
    <ul class="nav nav-tabs" id="infoTabs" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="header-tab" data-bs-toggle="tab" data-bs-target="#header" type="button" role="tab">Header</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="footer-tab" data-bs-toggle="tab" data-bs-target="#footer" type="button" role="tab">Footer</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab">Contact Us</button>
        </li>
    </ul>
    <form method="post" class="tab-content mt-3">
        <!-- Header Tab -->
        <div class="tab-pane fade show active" id="header" role="tabpanel">
            <div class="mb-3">
                <label>Logo URL</label>
                <input type="text" class="form-control" name="header[logo]" value="<?= htmlspecialchars($content['header']['logo'] ?? '') ?>">
            </div>
        </div>
        <!-- Footer Tab -->
        <div class="tab-pane fade" id="footer" role="tabpanel">
            <div class="mb-3">
                <label>Open Hours</label>
                <div class="row">
                    <?php foreach ($days as $day): ?>
                        <div class="col-md-6 col-lg-4 mb-2">
                            <div class="input-group">
                                <span class="input-group-text" style="min-width:100px;"><?= $day ?></span>
                                <input type="text" class="form-control" name="open_hours[<?= $day ?>]" value="<?= htmlspecialchars($open_hours[$day] ?? '') ?>" placeholder="e.g. 09:00-19:00 or Closed">
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="mb-3">
                <label>Address</label>
                <input type="text" class="form-control" name="footer[address]" value="<?= htmlspecialchars($content['footer']['address'] ?? '') ?>">
            </div>
            <div class="mb-3">
                <label>Phone</label>
                <input type="text" class="form-control" name="footer[phone]" value="<?= htmlspecialchars($content['footer']['phone'] ?? '') ?>">
            </div>
            <div class="mb-3">
                <label>Email</label>
                <input type="text" class="form-control" name="footer[email]" value="<?= htmlspecialchars($content['footer']['email'] ?? '') ?>">
            </div>
            <div class="mb-3">
                <label>Facebook URL</label>
                <input type="text" class="form-control" name="footer[facebook_url]" value="<?= htmlspecialchars($content['footer']['facebook_url'] ?? '') ?>">
            </div>
            <div class="mb-3">
                <label>Instagram URL</label>
                <input type="text" class="form-control" name="footer[instagram_url]" value="<?= htmlspecialchars($content['footer']['instagram_url'] ?? '') ?>">
            </div>
        </div>
        <!-- Contact Tab -->
        <div class="tab-pane fade" id="contact" role="tabpanel">
            <div class="mb-3">
                <label>Map Embed Code</label>
                <textarea class="form-control" name="contact[map_embed]" rows="2"><?= htmlspecialchars($content['contact']['map_embed'] ?? '') ?></textarea>
            </div>
            <div class="mb-3">
                <label>Contact Form Email</label>
                <input type="text" class="form-control" name="contact[form_email]" value="<?= htmlspecialchars($content['contact']['form_email'] ?? '') ?>">
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Save All</button>
    </form>
</div>
