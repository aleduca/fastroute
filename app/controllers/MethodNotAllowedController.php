<?php

namespace app\controllers;

class MethodNotAllowedController
{
    public function __construct()
    {
        http_response_code(405);
    }

    public function index()
    {
        var_dump('method not allowed');
    }
}
