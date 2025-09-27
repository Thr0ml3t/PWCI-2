<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$config = require './core/config.php';
$dbObject = new Database($config['db']['connection1']);

$routeParams = explode('/', trim($_SERVER['REQUEST_URI'], '/'));

$id = $routeParams[3] ?? null;

if (!$id) {
    http_response_code(400);
    echo json_encode(['error' => 'User ID is required']);
    exit;
}

$userQuery = $dbObject->query("SELECT * FROM users WHERE id = :id", ['id' => $id]);
$user = $userQuery->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    http_response_code(404);
    echo json_encode(['error' => 'User not found']);
    exit;
}

echo json_encode($user);