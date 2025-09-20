<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');


$config = require './core/config.php';
$dbObject = new Database($config['db']['connection1']);

try{
    $id = $_GET['userId'];
}catch(Exception $e){
    http_response_code(500);
    echo json_encode(['error' => 'Database connection error: ' . $e->getMessage()]);
    exit;
}


if(!isset($id)){
    http_response_code(400);
    echo json_encode(['error' => 'userId parameter is required']);
    exit;
}

$userQuery = $dbObject
->query("SELECT * FROM users where id = :id", ['id' => $id]);
$users = $userQuery->fetchAll(PDO::FETCH_ASSOC);


echo json_encode($users);