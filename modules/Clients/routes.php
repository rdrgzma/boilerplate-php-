<?php
/** @var \Core\Router $router */

use Modules\Clients\Controllers\ClientController;

$router->get('/admin/clients', [ClientController::class, 'index']);
$router->get('/admin/clients/create', [ClientController::class, 'create']);
