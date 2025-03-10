<?php
session_start();
require_once "../../../database.php"; // Load the database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    $conn = getDatabaseConnection();
    $stmt = $conn->prepare("SELECT id, email, first_name, last_name, profile_picture, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    if ($user && password_verify($password, $user["password"])) {
        // Set session variables
        $_SESSION["user_id"] = $user["id"];
        $_SESSION["user_email"] = $user["email"];
        $_SESSION["first_name"] = $user["first_name"];
        $_SESSION["last_name"] = $user["last_name"];
        $_SESSION["profile_picture"] = $user["profile_picture"];

        // Redirect to the dashboard
        header("Location: ../profile.php");
        exit();
    } else {
        // Redirect to login page with error
        header("Location: login.php?error=Invalid email or password.");
        exit();
    }

    $stmt->close();
    $conn->close();
}
?>
