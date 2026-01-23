<?php
session_start();

$conn = new mysqli("sql308.infinityfree.com", "if0_40808449", "rjt0APTUGP", "if0_40808449_auth_system");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
