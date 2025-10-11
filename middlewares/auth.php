<?php

session_start();
if (!isset($_SESSION['user_id'])) {
    if($_SERVER['REQUEST_URI'] !== '/login') {
        header('Location: /login');
        exit();
    }
}else {
    if($_SERVER['REQUEST_URI'] === '/login') {
        header('Location: /');
        exit();
    }
}