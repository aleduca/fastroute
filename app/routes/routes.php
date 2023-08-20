<?php

return [
    'GET' => [
        '/' => 'app/controllers/home.php',
        '/user/create' => 'app/controllers/user_create.php',
        '/404' => 'app/controllers/404.php',
    ],
    'POST' => [
        '/upload' => 'app/controllers/upload.php',
        '/user/store' => 'app/controllers/user_store.php',
    ],
];
