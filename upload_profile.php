<?php
include 'config.php';

if (!isset($_SESSION['user'])) {
    header("Location: signin.php");
}

$user_id = $_SESSION['user']['id'];
$file = $_FILES['profile']['name'];
$tmp = $_FILES['profile']['tmp_name'];

$newName = time() . "_" . $file;
move_uploaded_file($tmp, "assets/profile/" . $newName);

$conn->query("UPDATE users SET profile_pic='$newName' WHERE id=$user_id");

$_SESSION['user']['profile_pic'] = $newName;

header("Location: dashboard.php");
?>
