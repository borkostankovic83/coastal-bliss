<?php
session_start();
require_once('layout/header.php');
require_once('layout/navbar.php');

// Redirect to login if not logged in
if (!isset($_SESSION["user_email"])) {
    header("Location: auth/login.php");
    exit();
}

// Get current user data
$first_name = $_SESSION["first_name"];
$last_name = $_SESSION["last_name"];
$email = $_SESSION["user_email"];
$profile_picture = !empty($_SESSION["profile_picture"]) ? "../uploads/" . basename($_SESSION["profile_picture"]) : "assets/default-profile.png";

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = htmlspecialchars($_POST["first_name"]);
    $last_name = htmlspecialchars($_POST["last_name"]);
    $email = htmlspecialchars($_POST["email"]);

    // Handle profile picture upload
    if (!empty($_FILES["profile_picture"]["name"])) {
        $target_dir = "../uploads/";
        $target_file = $target_dir . basename($_FILES["profile_picture"]["name"]);

        // Move uploaded file to server
        if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $target_file)) {
            $_SESSION["profile_picture"] = $target_file;
            $profile_picture = $target_file;
        }
    }

    // Save updated data to session (replace with database update in production)
    $_SESSION["first_name"] = $first_name;
    $_SESSION["last_name"] = $last_name;
    $_SESSION["user_email"] = $email;

    // Redirect back to profile page after saving
    header("Location: profile.php");
    exit();
}
?>

<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center mb-4">Edit Profile</h2>
                <form method="POST" enctype="multipart/form-data" class="p-4 border rounded bg-white shadow-sm">
                    <!-- Profile Picture Upload -->
                    <div class="text-center mb-3">
                        <img id="preview" src="<?php echo $profile_picture; ?>" alt="Profile Picture" class="profile-img">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Profile Picture</label>
                        <input type="file" name="profile_picture" class="form-control" accept="image/*" onchange="previewImage(event)">
                    </div>

                    <!-- First Name -->
                    <div class="mb-3">
                        <label class="form-label">First Name</label>
                        <input type="text" name="first_name" class="form-control" value="<?php echo $first_name; ?>" required>
                    </div>

                    <!-- Last Name -->
                    <div class="mb-3">
                        <label class="form-label">Last Name</label>
                        <input type="text" name="last_name" class="form-control" value="<?php echo $last_name; ?>" required>
                    </div>

                    <!-- Email -->
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" value="<?php echo $email; ?>" required>
                    </div>

                    <!-- Buttons -->
                    <div class="d-flex justify-content-between">
                        <a href="profile.php" class="btn btn-secondary">Cancel</a>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <style>
        .profile-img {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            object-fit: cover;
            border: 3px solid #ddd;
        }
    </style>

    <script>
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function(){
                document.getElementById('preview').src = reader.result;
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</body>
</html>
