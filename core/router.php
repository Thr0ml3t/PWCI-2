<?php
namespace Core;

class Router {
    private $routes = [];

    public function add($route, $controller) {
        $this->routes[$route] = ['controller' => $controller];
    }

    public function addMiddleware($route, $middleware) {
        
        $this->routes[$route]['middleware'] = $middleware;
    }

    public function dispatch($uri) {
        foreach ($this->routes as $key => $route) {
            $routePattern = preg_replace('/:\w+/', '([^/]+)', trim($key, '/'));
            if (preg_match('#^' . $routePattern . '$#', trim($uri, '/'), $matches)) {
                $middleware = $route['middleware'] ?? null;
                if ($middleware) {
                    require $middleware;
                }
                require $route['controller'];
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
