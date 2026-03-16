<?php
/** @var \Core\Router $router */

use Modules\Finance\Controllers\FinanceController;

$router->get('/admin/finance', [FinanceController::class, 'index']);
$router->get('/admin/finance/create', [FinanceController::class, 'create']);
$router->post('/admin/finance/store', [FinanceController::class, 'store']);
