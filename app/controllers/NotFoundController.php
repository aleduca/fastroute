<?php

namespace app\controllers;

class NotFoundController
{
    public function __construct()
    {
        http_response_code(404);
    }

    public function index()
    {
        var_dump('not found');
    }
}
