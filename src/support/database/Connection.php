<?php

namespace Src\Support\Database;

use PDO;

class Connection
{

    public $PDO;

    //Set params to mysql connect
    public function open()
    {
        $Connect = [
            'DB_HOST' => env('DB_HOST'),
            'DB_PORT' => env('DB_PORT'),
            'DB_DATABASE' => env('DB_DATABASE'),
            'DB_USERNAME' => env('DB_USERNAME'),
            'DB_PASSWORD' => env('DB_PASSWORD'),
        ];

        $this->PDO = new PDO("mysql:host=" . $Connect['DB_HOST'] . ";dbname=" . $Connect['DB_DATABASE'], $Connect['DB_USERNAME'], $Connect['DB_PASSWORD']);

        return $this->PDO;
    }

    public function close()
    {
        $this->PDO = null;
    }
}
