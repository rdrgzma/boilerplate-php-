<?php
/** @var \Core\Router $router */

use Modules\Settings\Controllers\SettingController;

$router->get('/admin/settings', [SettingController::class, 'index']);
$router->post('/admin/settings/save', [SettingController::class, 'save']);
