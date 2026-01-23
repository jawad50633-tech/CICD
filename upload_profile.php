<?php
session_start();
include "db.php";

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if (isset($_FILES['profile_pic'])) {
    $img_name = $_FILES['profile_pic']['name'];
    $tmp_name = $_FILES['profile_pic']['tmp_name'];

    $ext = strtolower(pathinfo($img_name, PATHINFO_EXTENSION));
    $allowed = ['jpg','jpeg','png'];

    if (in_array($ext, $allowed)) {
        $new_name = time() . "_" . $_SESSION['user_id'] . "." . $ext;
        move_uploaded_file($tmp_name, "uploads/" . $new_name);

        mysqli_query($conn,
            "UPDATE users SET profile_pic='$new_name' WHERE id=".$_SESSION['user_id']
        );
    }
}

header("Location: dashboard.php");
exit();
