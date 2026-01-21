<?php
require 'config.php';

$data = json_decode(file_get_contents('php://input'), true);
$id_token = $data['token'] ?? '';

if(!$id_token) {
    echo json_encode(['success' => false]);
    exit;
}
$url = 'https://oauth2.googleapis.com/tokeninfo?id_token=' . $id_token;
$response = file_get_contents($url);
$user_info = json_decode($response, true);

if(isset($user_info['email'])) {
    echo json_encode(['success' => false]);
    exit;
} 
$_SESSION['user']=[
    'name'=>$user_info['name'],
    'email'=>$user_info['email'],
    'picture'=>$user_info['picture']
];
echo json_encode(['success' => true]);