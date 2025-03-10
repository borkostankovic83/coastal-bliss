<?php
require_once "../layout/header.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Generate reset token (simple example, in real use a secure token and store in DB)
        $reset_token = bin2hex(random_bytes(50));
        // Normally, you'd send an email; here we'll just display the link
        $reset_link = "process_reset.php?token=" . $reset_token;
        echo "<p>Click <a href='$reset_link'>here</a> to reset your password.</p>";
    } else {
        echo "<p>No user found with that email.</p>";
    }
}
?>

<form method="post">
    <label>Email</label>
    <input type="email" name="email" required>
    <button type="submit">Send Reset Link</button>
</form>
