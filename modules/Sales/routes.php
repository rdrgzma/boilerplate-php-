<?php
/** @var \Core\Router $router */

use Modules\Sales\Controllers\SalesController;

$router->get('/admin/sales', [SalesController::class, 'index']);
$router->get('/admin/sales/create', [SalesController::class, 'create']);
$router->post('/admin/sales/store', [SalesController::class, 'store']);
$router->get('/admin/sales/show/{id}', [SalesController::class, 'show']);
