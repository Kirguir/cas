<?php

namespace App;

class Conf
{
    public static array $Database = [
        'driver' => 'mysql',
        'host' => 'db',
        'database' => 'db_test',
        'username' => 'user',
        'password' => '',
        'charset' => 'utf8mb4',
        'collation' => 'utf8mb4_unicode_ci',
        'prefix' => '',
    ];

    public static array $Logs = [
        'path' => 'logs/app.log',
        'level' => 'debug',
    ];

    public static function parseFromFile($file = '../config.php')
    {
        if (file_exists($file)) {
            require_once $file;
        }
    }
}
