<?php

namespace Src\Support\Database;

use mysqli;

class DB
{

    public static function Query(string $Query)
    {
        $Connection = new mysqli(
            env('DB_HOST'),
            env('DB_USERNAME'),
            env('DB_PASSWORD'),
            env('DB_DATABASE'),
            env('DB_PORT')
        );

        return $Connection->query($Query);
    }
}
