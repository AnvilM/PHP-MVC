<?php

namespace Src\Database\Eloquent\Mysql\Select;

use PDO;

use Src\Contracts\Database\Eloquent\Drivers\Select\Select as SelectInterface;

use Src\Database\Eloquent\Builder;

class Select extends Builder implements SelectInterface
{





    public function __construct(string $Table, array $Fields = ['*'])
    {
        $Fields = implode(',', $Fields);

        $this->addToQuery("SELECT $Fields FROM $Table");
    }





    public function where(string $Field, string $Sign = '=', string $Value = '1', int $Type = PDO::PARAM_STR): Select
    {
        $Multiply = str_contains($this->getQuery(), 'WHERE') ? "AND" : "WHERE";

        $this->addToQuery("$Multiply $Field $Sign ?")->addBind($Value, $Type);

        return $this;
    }





    /**
     * Add ORDER BY to mysqli query
     *
     * @param  mixed $Field
     * @param  mixed $Method
     * @return Select
     */
    public function orderBy(string $Field, string $Method = 'DESC'): Select
    {
        $this->addToQuery("ORDER BY $Field $Method");

        return $this;
    }





    public function run()
    {
        return $this->build()->execute()->fetchAll(PDO::FETCH_ASSOC);
    }
}
