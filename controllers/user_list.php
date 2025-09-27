<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
use Core\Database;


$config = require './core/config.php';
$dbObject = new Database($config['db']['connection1']);


$userQuery = $dbObject
->query("SELECT * FROM users");
$users = $userQuery->fetchAll(PDO::FETCH_ASSOC);


echo json_encode($users);