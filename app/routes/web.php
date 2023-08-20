<?php

use app\controllers\HomeController;
use app\controllers\UserController;

return [
    ['GET', '/', [HomeController::class, 'index']],
    ['GET', '/users', [UserController::class, 'index']],
];
