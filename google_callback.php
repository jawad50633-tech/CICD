<?php
session_start();
header('Content-Type: application/json');

$input = json_decode(file_get_contents("php://input"), true);

if (!isset($input['credential'])) {
    echo json_encode(["status" => "error"]);
    exit;
}

$token = $input['credential'];

$verify = file_get_contents(
    "https://oauth2.googleapis.com/tokeninfo?id_token=" . $token
);

$user = json_decode($verify, true);

if (!isset($user['email'])) {
    echo json_encode(["status" => "invalid"]);
    exit;
}

// SESSION CREATE
$_SESSION['user'] = [
    'name' => $user['name'],
    'email' => $user['email'],
    'picture' => $user['picture']
];

echo json_encode(["status" => "success"]);
