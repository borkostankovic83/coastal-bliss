<?php
session_start();
require_once('layout/header.php');
require_once('layout/navbar.php');

// Redirect to login page if user is not logged in
if (!isset($_SESSION["user_email"])) {
    header("Location: auth/login.php");
    exit();
}

// Fetch user details from session
$first_name = htmlspecialchars($_SESSION["first_name"]);
$last_name = htmlspecialchars($_SESSION["last_name"]);
$email = htmlspecialchars($_SESSION["user_email"]);
$profile_picture = !empty($_SESSION["profile_picture"]) ? "../uploads/" . basename($_SESSION["profile_picture"]) : "assets/default-profile.png"; // Default if none
?>

<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8 text-center">
                <img src="<?php echo $profile_picture; ?>" alt="Profile Picture" class="profile-img mb-3">
                <h2 class="fw-bold"><?php echo $first_name . " " . $last_name; ?></h2>
                <p class="text-muted"><?php echo $email; ?></p>

                <!-- Profile Details Section -->
                <div class="profile-details mt-4 text-start">
                    <h4 class="text-primary">Profile Information</h4>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>First Name:</strong> <?php echo $first_name; ?></li>
                        <li class="list-group-item"><strong>Last Name:</strong> <?php echo $last_name; ?></li>
                        <li class="list-group-item"><strong>Email:</strong> <?php echo $email; ?></li>
                    </ul>
                </div>

                <!-- Settings Section -->
                <div class="mt-4 d-flex justify-content-center gap-3">
                    <a href="edit-profile.php" class="btn btn-outline-primary">Edit Profile</a>
                    <a href="auth/logout.php" class="btn btn-outline-danger">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <style>
        .profile-img {
            width: 180px;
            height: 180px;
            border-radius: 50%;
            object-fit: cover;
            background-color: #f0f0f0;
            border: 4px solid #ddd;
        }
        .profile-details .list-group-item {
            border: none;
            padding: 10px 0;
            background: transparent;
        }
    </style>
</body>
</html>
