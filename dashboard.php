<?php
include 'config.php';

if (!isset($_SESSION['user'])) {
    header("Location: signin.php");
}

$user = $_SESSION['user'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-dark bg-dark">
    <div class="container">
        <span class="navbar-brand">Dashboard</span>
        <a href="logout.php" class="btn btn-danger btn-sm">Logout</a>
    </div>
</nav>

<div class="container mt-5 text-center">
    <img src="assets/profile/<?php echo $user['profile_pic']; ?>" 
         class="rounded-circle" width="150">

    <h3 class="mt-3"><?php echo $user['name']; ?></h3>
    <p><?php echo $user['email']; ?></p>

    <form action="upload_profile.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="profile" class="form-control w-25 mx-auto mt-2" required>
        <button class="btn btn-primary mt-2">Change Profile Picture</button>
    </form>
</div>

</body>
</html>
