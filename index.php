<?php

$currentPage = $_SERVER['REQUEST_URI'];

switch ($currentPage) {
    case '/':
        require 'controllers/home.php';
        break;
    case '/about':
        require 'controllers/about.php';
        break;
    case '/movies':
        require 'controllers/movies.php';
        break;
    case '/pokemon':
        require 'controllers/pokemon.php';
        break;
    default:
        http_response_code(404);
        require 'views/404.view.php';
        break;
}