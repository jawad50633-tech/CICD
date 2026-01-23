<?php
$host = "sql308.infinityfree.com";
$user = "if0_40808449";
$pass = "rjt0APTUGP";
$db   = "if0_40808449_auth_system";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}
?>
