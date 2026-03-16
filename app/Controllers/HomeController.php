<?php

namespace App\Controllers;

use Core\Controller;
use App\Services\HomeGreetingService;

class HomeController extends Controller
{
    public function index()
    {
        // O Controller não tem regra, apenas chama o Service e devolve a View
        $service = new HomeGreetingService();
        $mensagem = $service->execute();

        $this->render('home', [
            'title' => 'Início - ' . $_ENV['APP_NAME'],
            'mensagem' => $mensagem
        ]);
    }
}