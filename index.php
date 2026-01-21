<?php
require 'config.php';?>
<!DOCTYPE html>
<html>
    <head>
        <title>Login with google</title>
        <script src="https://accounts.google.com/gsi/client" async defer></script>
    </head>
    <h2>Sign In / Sign Up</h2>
    <body>
        <div id="g_id_onload"
            data-client_id="<?php echo Google_Client_ID; ?>"
            data_callback="handleCredentialResponse"
            data-auto_prompt="false">
        </div>

        <div class="g_id_signin"
            data-type="standard"
            data-shape="rectangular"
            data-theme="outline"
            data-text="sign_in_with"
            data-size="large"
            data-logo_alignment="left">
        </div>
        <script>
            function handleCredentialResponse(response) {
                fetch("google-callback.php", {
                    method: "POST",
                    headers: {
                        "Content-Type": "application/x-www-form-urlencoded"
                    },
                    body: "credential=" + response.credential
                }).then(res => res.text())
                .then(data => {
                    console.log(data);
                    window.location.href = "dashboard.php";
                });
            }
        </script>
    </body>
</html>