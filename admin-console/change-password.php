<?php
session_start();

require_once('layout/header.php');
require_once('layout/navbar.php');
require_once "../../database.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

$conn = getDatabaseConnection();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $current = $_POST['current_password'];
    $new = $_POST['new_password'];
    $confirm = $_POST['confirm_password'];

    if ($new !== $confirm) {
        $error = "New passwords do not match.";
    } else {

        $stmt = $conn->prepare("
            SELECT password
            FROM users
            WHERE id = ?
        ");

        $stmt->bind_param("i", $_SESSION['user_id']);
        $stmt->execute();

        $user = $stmt->get_result()->fetch_assoc();

        if (!$user || !password_verify($current, $user['password'])) {
            $error = "Current password is incorrect.";
        } else {

            $hash = password_hash($new, PASSWORD_DEFAULT);

            $stmt = $conn->prepare("
                UPDATE users
                SET password = ?
                WHERE id = ?
            ");

            $stmt->bind_param(
                "si",
                $hash,
                $_SESSION['user_id']
            );

            $stmt->execute();

            $success = "Password updated successfully.";
        }
    }
}

?>

<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card shadow">
                <div class="card-header">
                    <h3 class="mb-0">Change Password</h3>
                </div>

                <div class="card-body">

                    <?php if (!empty($error)): ?>
                        <div class="alert alert-danger">
                            <?= htmlspecialchars($error) ?>
                        </div>
                    <?php endif; ?>

                    <?php if (!empty($success)): ?>
                        <div class="alert alert-success">
                            <?= htmlspecialchars($success) ?>
                        </div>
                    <?php endif; ?>

                    <form method="post">

                        <div class="mb-3">
                            <label class="form-label">
                                Current Password
                            </label>
                            <input
                                type="password"
                                name="current_password"
                                class="form-control"
                                required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">
                                New Password
                            </label>
                            <input
                                type="password"
                                name="new_password"
                                class="form-control"
                                required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">
                                Confirm New Password
                            </label>
                            <input
                                type="password"
                                name="confirm_password"
                                class="form-control"
                                required>
                        </div>

                        <button
                            type="submit"
                            class="btn btn-primary">
                            Change Password
                        </button>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

<!-- <?php require_once('layout/footer.php'); ?> -->