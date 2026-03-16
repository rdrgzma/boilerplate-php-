<?php

namespace App\Controllers;

use Core\Controller;
use Core\Auth;
use App\Services\LoginService;
use Exception;

class AuthController extends Controller
{
    public function index()
    {
        // Se já estiver logado, manda pro dashboard
        if (Auth::check()) {
            $this->redirect('/admin/dashboard');
        }

        $this->render('auth/login', ['title' => 'Login']);
    }

    public function store()
    {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        $service = new LoginService();

        try {
            $service->execute($email, $password);
            $this->redirect('/admin/dashboard');
        } catch (Exception $e) {
            $this->render('auth/login', [
                'title' => 'Login',
                'error' => $e->getMessage()
            ]);
        }
    }

    public function logout()
    {
        Auth::logout();
        $this->redirect('/login');
    }
}