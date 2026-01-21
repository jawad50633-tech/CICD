<?php require 'config.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Google Login</title>
    <script src="https://accounts.google.com/gsi/client" async defer></script>
</head>
<body>

<h2>Login with Google</h2>

<div id="g_id_onload"
     data-client_id="<?= GOOGLE_CLIENT_ID ?>"
     data-callback="handleCredentialResponse">
</div>

<div class="g_id_signin"></div>

<script>
function handleCredentialResponse(response) {

    fetch("google_callback.php", {
        method: "POST",
        headers: {
            "Content-Type": "application/json"
        },
        body: JSON.stringify({
            credential: response.credential
        })
    })
    .then(res => res.json())
    .then(data => {
        console.log(data); // 👈 DEBUG

        if (data.status === "success") {
            window.location.replace("dashboard.php");
        } else {
            alert("Login failed");
        }
    })
    .catch(err => {
        console.error(err);
        alert("Server error");
    });
}
</script>

</body>
</html>
