<?php
/** @var \Core\Router $router */

use Modules\Appointments\Controllers\AppointmentController;

$router->get('/admin/appointments', [AppointmentController::class, 'index']);
$router->get('/admin/appointments/create', [AppointmentController::class, 'create']);
$router->post('/admin/appointments/store', [AppointmentController::class, 'store']);
