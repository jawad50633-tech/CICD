<?php
session_start();
include "db.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$id = $_SESSION['user_id'];
$result = mysqli_query($conn, "SELECT * FROM users WHERE id=$id");
$user = mysqli_fetch_assoc($result);
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <span class="navbar-brand">Dashboard</span>
        <a href="logout.php" class="btn btn-outline-light btn-sm">Logout</a>
    </div>
</nav>

<div class="container mt-5">
    <div class="card shadow">
        <div class="card-body text-center">

            <img src="uploads/<?= $user['profile_pic'] ?>"
                 class="rounded-circle mb-3"
                 width="120" height="120"
                 style="object-fit:cover;">

            <h4><?= $user['username'] ?></h4>
            <p class="text-muted"><?= $user['email'] ?></p>

            <form action="upload_profile.php" method="POST" enctype="multipart/form-data">
                <input type="file" name="profile_pic" class="form-control mb-2" required>
                <button class="btn btn-primary btn-sm">Update Profile Picture</button>
            </form>

        </div>
    </div>
</div>
</body>
</html>
