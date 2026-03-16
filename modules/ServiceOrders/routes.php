<?php
/** @var \Core\Router $router */

use Modules\ServiceOrders\Controllers\ServiceOrderController;

$router->get('/admin/service-orders', [ServiceOrderController::class, 'index']);
$router->get('/admin/service-orders/create', [ServiceOrderController::class, 'create']);
