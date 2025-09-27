<?php
namespace Core;

class Router {
    private $routes = [];

    public function add($route, $controller) {
        $this->routes[$route] = $controller;
    }

    public function dispatch($uri) {
        foreach ($this->routes as $route => $controller) {
            $routePattern = preg_replace('/:\w+/', '([^/]+)', trim($route, '/'));
            if (preg_match('#^' . $routePattern . '$#', trim($uri, '/'), $matches)) {
                require $controller;
                return;
            }
        }
        $this->abort(404);
    }

    public function abort($code = 404) {
        http_response_code($code);
        echo "Error $code: Page not found.";
        exit();
    }
}
