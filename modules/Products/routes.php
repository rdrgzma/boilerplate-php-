<?php
/** @var \Core\Router $router */

use Modules\Products\Controllers\ProductController;

$router->get('/admin/products', [ProductController::class, 'index']);
$router->get('/admin/products/create', [ProductController::class, 'create']);
$router->post('/admin/products/store', [ProductController::class, 'store']);
