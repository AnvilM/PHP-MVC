<?php

namespace Src\Database\Eloquent\Mysql\Delete;

use PDO;

use Src\Contracts\Database\Eloquent\Drivers\Delete\Delete as DeleteInterface;

use Src\Database\Eloquent\Builder;

class Delete extends Builder implements DeleteInterface
{





    public function __construct(string $Table)
    {
        $this->addToQuery("DELETE FROM $Table");
    }





    public function where(string $Field, string $Sign = '=', string $Value = '1', int $Type = PDO::PARAM_STR): Delete
    {
        $Multiply = str_contains($this->getQuery(), 'WHERE') ? "AND" : "WHERE";

        $this->addToQuery("$Multiply $Field $Sign ?")->addBind($Value, $Type);

        return $this;
    }





    public function run()
    {
        return $this->build()->execute();
    }
}
