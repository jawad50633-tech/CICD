<?php
require 'config.php';

$google_login_url = "https://accounts.google.com/o/oauth2/v2/auth?" . http_build_query([
    'client_id'     => GOOGLE_CLIENT_ID,
    'redirect_uri'  => GOOGLE_REDIRECT_URI,
    'response_type' => 'code',
    'scope'         => 'email profile',
    'access_type'   => 'online',
    'prompt'        => 'select_account'
]);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login with Google</title>
</head>
<body>

<h2>Login / Sign up</h2>

<a href="<?= htmlspecialchars($google_login_url) ?>">
    <img src="https://developers.google.com/identity/images/btn_google_signin_dark_normal_web.png">
</a>

</body>
</html>
