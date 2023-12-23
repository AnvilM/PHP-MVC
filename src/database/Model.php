<?php

namespace Src\Database;

use mysqli;

class Model
{
    private array $Connect = [];




    //Set params to mysql connect
    public function __construct()
    {
        $this->Connect = [
            'DB_HOST' => env('DB_HOST'),
            'DB_PORT' => env('DB_PORT'),
            'DB_DATABASE' => env('DB_DATABASE'),
            'DB_USERNAME' => env('DB_USERNAME'),
            'DB_PASSWORD' => env('DB_PASSWORD'),
        ];
    }




    //Connect to database
    private function Connect()
    {
        return new mysqli($this->Connect['DB_HOST'], $this->Connect['DB_USERNAME'], $this->Connect['DB_PASSWORD'], $this->Connect['DB_DATABASE'], $this->Connect['DB_PORT']);
    }





    //Query
    public function Query($query)
    {
        return $this->Connect()->query($query)->fetch_all(MYSQLI_ASSOC);
    }
}
