<?php

namespace app\controllers;

class UserController
{
    public function index()
    {
        var_dump('index no users');
    }

    public function show($id)
    {
        var_dump($id);
    }
}
