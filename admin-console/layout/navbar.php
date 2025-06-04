<?php $currentPage = basename($_SERVER['PHP_SELF']); ?>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="profile.php">Dashboard</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link <?= $currentPage == 'profile.php' ? 'active' : '' ?>" href="profile.php">Profile</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $currentPage == 'inquiries.php' ? 'active' : '' ?>" href="inquiries.php">Inquiries</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $currentPage == 'register_user.php' ? 'active' : '' ?>" href="register_user.php">Register User</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $currentPage == 'list_users.php' ? 'active' : '' ?>" href="list_users.php">All Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $currentPage == 'applicants.php' ? 'active' : '' ?>" href="applicants.php">Applicants</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $currentPage == 'edit-massages.php' ? 'active' : '' ?>" href="edit-massages.php">Edit Massages</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?= $currentPage == 'edit-facials.php' ? 'active' : '' ?>" href="edit-facials.php">Edit Facials</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="auth/logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
