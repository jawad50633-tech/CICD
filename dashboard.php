<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>

<h2>Welcome, <?= htmlspecialchars($_SESSION['user']['name']) ?></h2>
<p>Email: <?= htmlspecialchars($_SESSION['user']['email']) ?></p>
<img src="<?= $_SESSION['user']['photo'] ?>" width="100">

<br><br>
<a href="logout.php">Logout</a>

</body>
</html>
