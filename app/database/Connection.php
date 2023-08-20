<?php

namespace app\database;

use PDO;

class Connection
{
    private static ?PDO $connection = null;

    public static function get()
    {
        if (!self::$connection) {
            self::$connection = new PDO('mysql:host=localhost;dbname=blog_ci', 'root', '');
        }

        return self::$connection;
    }
}
