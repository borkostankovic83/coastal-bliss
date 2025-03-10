<?php
require_once "../../database.php";
require_once "layout/header.php";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $first_name = trim($_POST["first_name"]);
    $last_name = trim($_POST["last_name"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);
    $confirm_password = trim($_POST["confirm_password"]);

    // Validate passwords match
    if ($password !== $confirm_password) {
        header("Location: register.php?error=Passwords do not match");
        exit();
    }

    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Optional: Profile Picture Handling (Check if file is uploaded)
    if (isset($_FILES["profile_picture"]) && $_FILES["profile_picture"]["error"] == 0) {
        $upload_dir = "../uploads/"; // Directory relative to the project root
        $file_name = basename($_FILES["profile_picture"]["name"]);
        $file_path = $upload_dir . $file_name;

        // Check if file is an image
        if (getimagesize($_FILES["profile_picture"]["tmp_name"])) {
            if (move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $file_path)) {
                $profile_picture = $file_path; // Store the file path in the database
            } else {
                echo "Error uploading file.";
            }
        } else {
            echo "File is not an image.";
        }
    }

    // Insert into database
    $conn = getDatabaseConnection();
    $stmt = $conn->prepare("INSERT INTO users (first_name, last_name, email, password, profile_picture) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $first_name, $last_name, $email, $hashed_password, $profile_picture);

    if ($stmt->execute()) {
        header("Location: auth/login.php?success=Account created. Please login.");
        exit();
    } else {
        header("Location: register.php?error=Registration failed. Try again.");
        exit();
    }

    $stmt->close();
    $conn->close();
}
?>

<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="card p-5 shadow-sm" style="max-width: 400px; width: 100%;">
        <h2 class="text-center mb-4">Register</h2>
        <?php if (isset($_GET['error'])): ?>
            <div class="alert alert-danger"><?php echo htmlspecialchars($_GET['error']); ?></div>
        <?php endif; ?>
        <form action="register.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="first_name" class="form-label">First Name</label>
                <input type="text" class="form-control" id="first_name" name="first_name" required>
            </div>
            <div class="mb-3">
                <label for="last_name" class="form-label">Last Name</label>
                <input type="text" class="form-control" id="last_name" name="last_name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-3">
                <label for="confirm_password" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
            </div>
            <div class="mb-3">
                <label for="profile_picture" class="form-label">Profile Picture (optional)</label>
                <input type="file" class="form-control" id="profile_picture" name="profile_picture">
            </div>
            <button type="submit" class="btn btn-primary w-100">Register</button>
        </form>
    </div>
</div>
