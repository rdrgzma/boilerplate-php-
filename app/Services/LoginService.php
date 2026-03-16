<?php

namespace App\Services;

use App\Models\User;
use Core\Auth;
use Exception;

class LoginService
{
    public function execute(string $email, string $password): void
    {
        // 1. Busca o usuário pelo e-mail
        $user = User::findByEmail($email);

        if (!$user) {
            throw new Exception("E-mail ou senha incorretos.");
        }

        // 2. Verifica a senha criptografada (hash)
        if (!password_verify($password, $user['password'])) {
            throw new Exception("E-mail ou senha incorretos.");
        }

        // 3. Registra o usuário na sessão
        Auth::login($user);
    }
}