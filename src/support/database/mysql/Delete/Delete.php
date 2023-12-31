<?php

namespace Src\Support\Database\Mysql\Delete;

use PDO;

use Src\Contracts\Support\Database\Drivers\Delete\Delete as DeleteInterface;

use Src\Support\Database\Builder;

class Delete extends Builder implements DeleteInterface
{





    public function __construct(string $Table)
    {
        $this->addToQuery("DELETE FROM $Table");
    }





    /**
     * Add Where to query
     *
     * @param  mixed $Column Colmn
     * @param  mixed $Sign Sign (+, -, >, <, =)
     * @param  mixed $Value Value
     * @param  mixed $Type Value data type
     * @return Select
     */
    public function where(string $Column, string $Sign = '=', string $Value = '1', int $Type = PDO::PARAM_STR): Delete
    {
        $Multiply = str_contains($this->getQuery(), 'WHERE') ? "AND" : "WHERE";

        $this->addToQuery("$Multiply $Column $Sign ?")->addBind($Value, $Type);

        return $this;
    }





    /**
     * Execute query
     *
     * @return void
     */
    public function run()
    {
        return $this->build()->execute();
    }
}
