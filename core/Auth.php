<?php

namespace Core;

class Auth
{
    public static function login(array $user): void
    {
        // Salva os dados básicos do usuário na sessão
        $_SESSION['user'] = [
            'id' => $user['id'],
            'company_id' => $user['company_id'] ?? null,
            'name' => $user['name'],
            'email' => $user['email']
        ];
    }

    public static function logout(): void
    {
        unset($_SESSION['user']);
        session_destroy();
    }

    public static function check(): bool
    {
        return isset($_SESSION['user']);
    }

    public static function user(): ?array
    {
        return $_SESSION['user'] ?? null;
    }

    /**
     * Bloqueia a página se não estiver logado.
     */
    public static function requireLogin(): void
    {
        if (!self::check()) {
            header('Location: /login');
            exit;
        }
    }
}