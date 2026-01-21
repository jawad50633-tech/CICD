<?php
session_start();
if(!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>User Dashboard</title>
    </head>
    <body>
        <h2>Welcome, <?php echo htmlspecialchars($_SESSION['user']['name']); ?>!</h2>
        <img src="<?php echo htmlspecialchars($_SESSION['user']['picture']); ?>" alt="Profile Picture" />
        <p>Email: <?php echo htmlspecialchars($_SESSION['user']['email']); ?></p>
        <a href="logout.php">Logout</a>
    </body>