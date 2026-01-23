<?php
include "db.php";

if (isset($_POST['signup'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email    = mysqli_real_escape_string($conn, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $check = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    if (mysqli_num_rows($check) > 0) {
        $error = "Email already exists!";
    } else {
        mysqli_query($conn, 
            "INSERT INTO users (username, email, password)
             VALUES ('$username','$email','$password')"
        );
        header("Location: login.php");
        exit();
    }
}
?>

<form method="POST">
    <h2>Sign Up</h2>
    <input type="text" name="username" placeholder="Username" required><br><br>
    <input type="email" name="email" placeholder="Email" required><br><br>
    <input type="password" name="password" placeholder="Password" required><br><br>
    <button name="signup">Sign Up</button>
    <p style="color:red"><?= $error ?? '' ?></p>
</form>
