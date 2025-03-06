<?php
// Start the session
session_start();

// Check if the user is logged in (assuming 'user' is the session variable that indicates a logged-in user)
if (!isset($_SESSION['user'])) {
    // Redirect to login.php if there is no session
    header("Location: login.php");
    exit(); // Make sure no further code is executed after the redirect
}

// If the user is logged in, show the content of the index page
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
</head>
<body>
    <h1>Welcome to the Home Page</h1>
    <p>You are logged in as <?php echo $_SESSION['user']; ?>.</p>
    <a href="logout.php">Logout</a>
</body>
</html>
