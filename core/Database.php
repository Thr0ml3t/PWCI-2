<?php

class Database {
    private $connection;

    public function __construct($config) {
        $this->connection = new PDO(
            "mysql:host={$config['host']};dbname={$config['dbname']};charset=utf8mb4;user={$config['username']};password={$config['password']}",
        );
        $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    
    public function query($sql, $params = []) {
        $stmt = $this->connection->prepare($sql);
        $stmt->execute($params);
        return $stmt;
    }
}