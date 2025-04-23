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


