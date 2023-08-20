<?php

use app\controllers\AdminController;
use app\controllers\AdminPostsController;
use app\controllers\AdminUsersController;

return function () {
    return [
        ['GET', '', [AdminController::class, 'index']],
        ['GET', '/users', [AdminUsersController::class, 'index']],
        ['GET', '/posts', [AdminPostsController::class, 'index']],
    ];
};
