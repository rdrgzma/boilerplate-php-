<?php
/** @var \Core\Router $router */

use Modules\Settings\Controllers\SettingController;

$router->get('/admin/settings', [SettingController::class, 'index']);
