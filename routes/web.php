<?php

use App\Controllers\HomeController;
use App\Controllers\AuthController;
use App\Controllers\DashboardController;

/** @var \Core\Router $router */

$router->get('/', [HomeController::class, 'index']);

// Rotas de Autenticação
$router->get('/login', [AuthController::class, 'index']);
$router->post('/login', [AuthController::class, 'store']);
$router->get('/logout', [AuthController::class, 'logout']);

// Rotas da Área Administrativa
$router->get('/admin/dashboard', [DashboardController::class, 'index']);