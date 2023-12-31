<?php

namespace Src\Support\Database;

use Src\Contracts\Support\Database\Drivers\Driver;

use Src\Support\Database\Mysql\Mysql;


class DB
{

    private static Driver $Driver;





    /**
     * Set table for query
     *
     * @param  mixed $Table Table
     * @return Driver
     */
    public static function table(string $Table): Driver
    {
        return self::Driver($Table);
    }





    private static function Driver(string $Table): Driver
    {
        switch (env("DB_CONNECTION"))
        {
            case ("mysql"):
                self::$Driver = new Mysql($Table);
        }

        return self::$Driver;
    }





    /**
     * Custom query
     *
     * @param  mixed $Query Query string
     * @param  mixed $Values Query values for preparing
     * @return PDOStatement
     */
    public static function query(string $Query, array $Values = [])
    {
        $Builder = new Builder;

        if (count($Values) > 0)
        {
            $Builder->addToQuery($Query);

            foreach ($Values as $Value)
            {
                $Builder->addBind($Value[0], $Value[1]);
            }

            return $Builder->build()->execute();
        }

        return $Builder->exec($Query);
    }
}
