<?php
/** @var \Core\Router $router */

use Modules\Users\Controllers\UserController;

$router->get('/admin/users', [UserController::class, 'index']);
$router->get('/admin/users/create', [UserController::class, 'create']);
