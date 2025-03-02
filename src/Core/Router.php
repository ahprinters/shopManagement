<?php
namespace Shop\Core;

class Router {
    private $routes = [];

    public function get($path, $callback) {
        $this->routes['GET'][$path] = $callback;
    }

    public function post($path, $callback) {
        $this->routes['POST'][$path] = $callback;
    }

    public function resolve() {
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $method = $_SERVER['REQUEST_METHOD'];
        
        // Remove trailing slashes
        $path = rtrim($path, '/');
        
        // If path is empty, set it to /
        if (empty($path)) {
            $path = '/';
        }

        $callback = $this->routes[$method][$path] ?? null;

        if ($callback === null) {
            http_response_code(404);
            require_once __DIR__ . '/../../views/404.php';
            return;
        }

        if (is_callable($callback)) {
            return call_user_func($callback);
        }

        if (is_array($callback)) {
            [$class, $method] = $callback;
            if (class_exists($class)) {
                $class = new $class();
                if (method_exists($class, $method)) {
                    return call_user_func_array([$class, $method], []);
                }
            }
        }
    }
} 