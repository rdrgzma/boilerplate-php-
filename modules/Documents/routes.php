<?php
/** @var \Core\Router $router */

use Modules\Documents\Controllers\DocumentController;

$router->get('/admin/documents', [DocumentController::class, 'index']);
$router->get('/admin/documents/create', [DocumentController::class, 'create']);
$router->post('/admin/documents/store', [DocumentController::class, 'store']);
