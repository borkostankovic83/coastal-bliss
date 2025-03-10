<?php
require_once "../layout/header.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_password = trim($_POST["new_password"]);
    $confirm_password = trim($_POST["confirm_password"]);

    if ($new_password !== $confirm_password) {
        die("Passwords do not match.");
    }

    $hashedPassword = password_hash($new_password, PASSWORD_BCRYPT);
    // Normally, you'd update by token, but here we assume an email was used
    $stmt = $pdo->prepare("UPDATE users SET password = :password WHERE email = :email");
    $stmt->execute(['password' => $hashedPassword, 'email' => $_GET['email']]);

    echo "<p>Password reset successfully. <a href='login.php'>Login</a></p>";
}
?>

<form method="post">
    <label>New Password</label>
    <input type="password" name="new_password" required>
    <label>Confirm Password</label>
    <input type="password" name="confirm_password" required>
    <button type="submit">Reset Password</button>
</form>
