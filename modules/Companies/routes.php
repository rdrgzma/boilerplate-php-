<?php
/** @var \Core\Router $router */

use Modules\Companies\Controllers\CompanyController;

$router->get('/admin/companies', [CompanyController::class, 'index']);
$router->get('/admin/companies/create', [CompanyController::class, 'create']);
