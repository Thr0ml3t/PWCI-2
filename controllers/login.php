<?php

$requestMethod = $_SERVER['REQUEST_METHOD'] ?? 'GET';

if($requestMethod === 'GET'){
    $page = 'Login';

    $currentPage = $_SERVER['REQUEST_URI'];

    require 'views/login.view.php';
}

if($requestMethod === 'POST'){

    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    if($username === 'admin' && $password === 'password'){
        $_SESSION['user_id'] = 1; // ID do usuário autenticado
        header('Location: /');
        exit();
    } else {
        $error = "Credenciais inválidas.";
        $page = 'Login';
        require 'views/login.view.php';
    }
}

