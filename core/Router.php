<?php

namespace Core;

class Router
{
    private array $routes = [];

    public function get(string $uri, array|callable $action): void
    {
        $this->routes['GET'][$uri] = $action;
    }

    public function post(string $uri, array|callable $action): void
    {
        $this->routes['POST'][$uri] = $action;
    }

    public function dispatch(string $method, string $uri): void
    {
        $uri = parse_url($uri, PHP_URL_PATH);
        $routesForMethod = $this->routes[$method] ?? [];

        foreach ($routesForMethod as $routeUri => $action) {
            $pattern = preg_replace('/\{([a-zA-Z0-9_]+)\}/', '([^/]+)', $routeUri);
            $pattern = "@^" . $pattern . "$@D";

            if (preg_match($pattern, $uri, $matches)) {
                array_shift($matches);
                $this->executeAction($action, $matches);
                return;
            }
        }

        http_response_code(404);
        echo "<h1>404 - Página não encontrada</h1>";
    }

    private function executeAction(array|callable $action, array $params): void
    {
        if (is_array($action)) {
            [$controllerClass, $method] = $action;
            if (class_exists($controllerClass)) {
                $controller = new $controllerClass();
                $controller->$method(...$params);
                return;
            }
        } elseif (is_callable($action)) {
            $action(...$params);
            return;
        }
        die("Erro: Ação inválida na rota.");
    }
}