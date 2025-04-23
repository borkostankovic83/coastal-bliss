<?php
session_start();
require_once "../../database.php";
require_once('layout/header.php');  // Include the header
require_once('layout/navbar.php');  // Include the navbar

$conn = getDatabaseConnection();

$query = "SELECT first_name, last_name, email, profile_picture FROM users";
$result = mysqli_query($conn, $query);

$users = [];
while ($row = mysqli_fetch_assoc($result)) {
    $users[] = $row;
}
?>



<div class="container">
    <h2>All Users</h2>
    <table class="user-table">
        <thead>
            <tr>
                <th>Profile</th>
                <th>Name</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
                <tr>
                    <td>
                        <img src="uploads/<?php echo htmlspecialchars($user['profile_picture']); ?>" alt="Profile Picture" class="profile-img">
                    </td>
                    <td><?php echo htmlspecialchars($user['first_name'] . ' ' . $user['last_name']); ?></td>
                    <td><?php echo htmlspecialchars($user['email']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>




<style>
.container {
    width: 80%;
    margin: auto;
    text-align: center;
}

.user-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

.user-table th, .user-table td {
    padding: 10px;
    border: 1px solid #ddd;
}

.profile-img {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    object-fit: cover;
}

</style>