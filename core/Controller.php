<?php

namespace Core;

abstract class Controller
{
    protected function render(string $view, array $data = [], string $layout = 'layout'): void
    {
        // Tenta encontrar a view em app/Views ou modules/
        $viewPath = __DIR__ . "/../app/Views/{$view}.php";
        if (!file_exists($viewPath)) {
            $viewPath = __DIR__ . "/../{$view}.php";
        }

        if (!file_exists($viewPath)) {
            // Se o caminho não começar com 'modules', tenta prefixar
            if (strpos($view, 'modules/') !== 0) {
                $viewPath = __DIR__ . "/../modules/{$view}.php";
            }
        }

        $layoutPath = __DIR__ . "/../app/Views/{$layout}.php";
        
        if (!file_exists($viewPath)) {
            die("View não encontrada: {$view}");
        }

        if (!file_exists($layoutPath)) {
            die("Layout não encontrado: {$layout}");
        }

        extract($data);
        
        // Renderiza passando a view específica para dentro do layout base
        $contentView = $viewPath;
        require $layoutPath;
    }

    protected function redirect(string $url): void
    {
        header("Location: {$url}");
        exit;
    }
}