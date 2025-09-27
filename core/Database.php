<?php
namespace Core;

use PDO;

class Database {
    private $connection;

    public function __construct($config) {
        $connectionString = "mysql:".http_build_query($config,'',';');

        $this->connection = new PDO($connectionString, $config['username'], $config['password']);
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    
    public function query($sql, $params = []) {
        $stmt = $this->connection->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }
}