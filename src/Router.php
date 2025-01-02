<?php

namespace Orbitphpframework\Orbit;

class Router
{
    protected array $routes = [];

    public function get(string $uri, callable|string $action): void
    {
        $this->addRoute('GET', $uri, $action);
    }

    public function post(string $uri, callable|string $action): void
    {
        $this->addRoute('POST', $uri, $action);
    }

    protected function addRoute(string $method, string $uri, callable|string $action): void
    {
        $this->routes[] = [
            'method' => $method,
            'uri' => $this->normalizeUri($uri),
            'action' => $action,
        ];
    }

    public function dispatch(string $requestUri, string $requestMethod): void
    {
        $requestUri = $this->normalizeUri($requestUri);

        foreach ($this->routes as $route) {
            if ($route['method'] === $requestMethod && $route['uri'] === $requestUri) {
                if (is_callable($route['action'])) {
                    call_user_func($route['action']);
                } elseif (is_string($route['action'])) {
                    $this->callController($route['action']);
                }
                return;
            }
        }

        http_response_code(404);
        echo "404 Not Found";
    }

    protected function callController(string $action): void
    {
        [$controller, $method] = explode('@', $action);
        $controllerClass = "App\\Controllers\\{$controller}";

        if (!class_exists($controllerClass) || !method_exists($controllerClass, $method)) {
            http_response_code(500);
            echo "Controller or method not found: {$controller}@{$method}";
            return;
        }

        $controllerInstance = new $controllerClass();
        call_user_func([$controllerInstance, $method]);
    }

    protected function normalizeUri(string $uri): string
    {
        return trim($uri, '/');
    }
}
