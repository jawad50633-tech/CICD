<?php require 'config.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Google Login</title>

    <!-- REQUIRED -->
    <script src="https://accounts.google.com/gsi/client" async defer></script>
</head>
<body>

<h2>Login with Google</h2>

<!-- REQUIRED ROOT -->
<div id="g_id_onload"
     data-client_id="<?= GOOGLE_CLIENT_ID ?>"
     data-callback="handleCredentialResponse">
</div>

<!-- BUTTON -->
<div class="g_id_signin"
     data-type="standard"
     data-size="large"
     data-theme="outline"
     data-text="signin_with"
     data-shape="rectangular">
</div>

<script>
function handleCredentialResponse(response) {
    console.log("Token received"); // DEBUG
}
</script>

</body>
</html>
