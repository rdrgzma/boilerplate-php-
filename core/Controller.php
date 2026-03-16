<?php

namespace Core;

abstract class Controller
{
    protected function render(string $view, array $data = []): void
    {
        $viewPath = __DIR__ . "/../app/Views/{$view}.php";
        
        if (!file_exists($viewPath)) {
            die("View não encontrada: {$view}");
        }

        extract($data);
        
        // Renderiza passando a view específica para dentro do layout base
        $contentView = $viewPath;
        require __DIR__ . "/../app/Views/layout.php";
    }

    protected function redirect(string $url): void
    {
        header("Location: {$url}");
        exit;
    }
}