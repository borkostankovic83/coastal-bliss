<?php
session_start();
require_once "../../database.php";
require_once('layout/header.php');  // Include the header
require_once('layout/navbar.php');  // Include the navbar

$conn = getDatabaseConnection();
$current_email = $_SESSION["user_email"];
$first_name = $_SESSION["first_name"];
$last_name = $_SESSION["last_name"];
$email = $_SESSION["user_email"];
$profile_picture = !empty($_SESSION["profile_picture"]) ? "../uploads/" . basename($_SESSION["profile_picture"]) : "assets/default-profile.png";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = htmlspecialchars($_POST["first_name"]);
    $last_name = htmlspecialchars($_POST["last_name"]);
    $email = htmlspecialchars($_POST["email"]);

    // Default to existing profile picture
    $profile_pic_filename = $_SESSION["profile_picture"];

    // Handle profile picture upload if a new one is provided
    if (!empty($_FILES["profile_picture"]["name"])) {
        $target_dir = "../uploads/";
        $timestamp = time();
        $original_filename = basename($_FILES["profile_picture"]["name"]);
        $extension = pathinfo($original_filename, PATHINFO_EXTENSION);
        $unique_filename = pathinfo($original_filename, PATHINFO_FILENAME) . "_$timestamp." . $extension;
        $target_file = $target_dir . $unique_filename;

        if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $target_file)) {
            $profile_pic_filename = $unique_filename;
            $_SESSION["profile_picture"] = $unique_filename;
            $profile_picture = $target_file;
        }
    }

    // Update user info in database
    $stmt = $conn->prepare("UPDATE users SET first_name = ?, last_name = ?, email = ?, profile_picture = ? WHERE email = ?");
    $stmt->bind_param("sssss", $first_name, $last_name, $email, $profile_pic_filename, $current_email);
    $stmt->execute();
    $stmt->close();

    // Update session values
    $_SESSION["first_name"] = $first_name;
    $_SESSION["last_name"] = $last_name;
    $_SESSION["user_email"] = $email;

    // Redirect back to profile
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
