<?php

namespace App\Controllers;

use Core\Controller;
use Core\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // PROTEÇÃO: Só passa daqui se estiver logado!
        Auth::requireLogin();

        $user = Auth::user();

        $this->render('admin/dashboard', [
            'title' => 'Painel Administrativo',
            'userName' => $user['name']
        ]);
    }
}