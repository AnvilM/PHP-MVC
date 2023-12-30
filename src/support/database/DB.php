<?php

namespace Src\Support\Database;

use Src\Contracts\Support\Database\Drivers\Driver;

use Src\Support\Database\Mysql\Delete\Delete;
use Src\Support\Database\Mysql\Insert\Insert;
use Src\Support\Database\Mysql\Select\Select;
use Src\Support\Database\Mysql\Update\Update;

use Src\Support\Database\Mysql\Mysql;


class DB
{

    private static Driver $Driver;
    //Set model tabel
    public static function table(string $Table)
    {
        return self::Driver($Table);
    }

    private static function Driver(string $Table)
    {
        switch (env("DB_CONNECTION"))
        {
            case ("mysql"):
                self::$Driver = new Mysql($Table);
        }

        return self::$Driver;
    }
}
