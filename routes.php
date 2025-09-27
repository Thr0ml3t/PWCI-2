<?php 
use Core\Router;

$router = new Router();

$router->add('/', 'controllers/home.php');
$router->add('/about', 'controllers/about.php');
$router->add('/movies', 'controllers/movies.php');
$router->add('/pokemon', 'controllers/pokemon.php');
$router->add('/api/v1/user/:id', 'controllers/user_detail.php');
$router->add('/api/v1/user', 'controllers/user_list.php');
$router->add('/users', 'controllers/users_page.php');
$router->add('/users/:id', 'controllers/users_detail_page.php');
$router->dispatch($_SERVER['REQUEST_URI']);