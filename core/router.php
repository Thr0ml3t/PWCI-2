<?php

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$routes = [
    '/' => 'controllers/home.php',
    '/about' => 'controllers/about.php',
    '/movies' => 'controllers/movies.php',
    '/pokemon' => 'controllers/pokemon.php',
    '/users' => 'controllers/users.php',
];

function routeToController($uri, $routes) {
    if (array_key_exists($uri, $routes)) {
    require $routes[$uri];
} else {
    abort(404);

}
}

function abort($code = 404) {
    http_response_code($code);
    require 'views/404.view.php';
    exit();
}

routeToController($uri, $routes);