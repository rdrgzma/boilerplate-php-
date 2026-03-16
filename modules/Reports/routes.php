<?php
/** @var \Core\Router $router */

use Modules\Reports\Controllers\ReportController;

$router->get('/admin/reports', [ReportController::class, 'index']);
