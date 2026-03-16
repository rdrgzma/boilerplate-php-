<?php
/** @var \Core\Router $router */

use Modules\Appointments\Controllers\AppointmentController;

$router->get('/admin/appointments', [AppointmentController::class, 'index']);
$router->get('/admin/appointments/create', [AppointmentController::class, 'create']);
