<?php
require 'config.php';

if (!isset($_GET['code'])) {
    exit('Login failed');
}

/* Exchange authorization code for access token */
$token_url = "https://oauth2.googleapis.com/token";

$postData = [
    'code'          => $_GET['code'],
    'client_id'     => GOOGLE_CLIENT_ID,
    'client_secret' => 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,
    'redirect_uri'  => GOOGLE_REDIRECT_URI,
    'grant_type'    => 'authorization_code'
];

$ch = curl_init($token_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($postData));
$response = json_decode(curl_exec($ch), true);
curl_close($ch);

if (!isset($response['access_token'])) {
    exit('Token error');
}

/* Get user info */
$userInfo = json_decode(file_get_contents(
    "https://www.googleapis.com/oauth2/v2/userinfo?access_token=" . $response['access_token']
), true);

/* Save user session */
$_SESSION['user'] = [
    'id'    => $userInfo['id'],
    'name'  => $userInfo['name'],
    'email' => $userInfo['email'],
    'photo' => $userInfo['picture']
];

/* Redirect to dashboard */
header("Location: dashboard.php");
exit;
