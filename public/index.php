<?php

session_start();

use app\controllers\HomeController;
use app\controllers\UserController;
use core\library\Router;
use core\library\Session;

require '../vendor/autoload.php';

$admin = require base_path() . '/app/routes/admin.php';

$router = new Router;

$router->group('/admin', $admin);

$router->add('GET', '/', [HomeController::class, 'index']);
$router->add('POST', '/users', [UserController::class, 'index']);
$router->add('GET', '/user/{id:[0-9]+}', [UserController::class, 'show']);

$router->run();

Session::flash_remove();
