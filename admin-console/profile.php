<?php
session_start();
require_once('layout/header.php');  // Include the header with the navbar
?>
<?php
// Check if user is logged in, otherwise redirect to login page
if (!isset($_SESSION["user_email"])) {
    header("Location: auth/login.php");
    exit();
}

// Display user details
$first_name = htmlspecialchars($_SESSION["first_name"]);
$last_name = htmlspecialchars($_SESSION["last_name"]);
$email = htmlspecialchars($_SESSION["user_email"]);
$profile_picture = htmlspecialchars($_SESSION["profile_picture"]);

require_once "layout/header.php";
?>

<body class="bg-light">
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card p-5 shadow-sm" style="max-width: 600px; width: 100%;">
            <h2 class="text-center mb-4">Welcome, <?php echo $first_name . " " . $last_name; ?>!</h2>
            <p><strong>Email:</strong> <?php echo $email; ?></p>

            <?php if (!empty($profile_picture)): ?>
                <!-- Display the profile picture from the uploads folder -->
                <div class="text-center">
                    <img src="<?php echo "../uploads/" . basename($profile_picture); ?>" alt="Profile Picture" class="img-fluid rounded-circle" width="150">
                </div>
            <?php else: ?>
                <p>No profile picture uploaded.</p>
            <?php endif; ?>

            <a href="auth/logout.php" class="btn btn-danger mt-3">Logout</a>
        </div>
    </div>
</body>
</html>
