<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentication System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <?php
        // Get the current folder of the script
        $currentFolder = basename(dirname($_SERVER['PHP_SELF'])); // Get the folder name

        // Determine the path to the CSS file based on the folder
        if ($currentFolder == 'auth') {
            // For pages in the 'auth' folder, CSS is one level up
            echo '<link href="../css/styles.css" rel="stylesheet">';
        } else {
            // For root directory pages, CSS is directly in the 'css' folder
            echo '<link href="css/styles.css" rel="stylesheet">';
        }
    ?>
 </head>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="profile.php">Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="profile.php">Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="inquiries.php">Inquiries</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="register_user.php">Register User</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="list_users.php">All Users</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="auth/logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
