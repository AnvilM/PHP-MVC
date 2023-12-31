<?php

namespace Src\Support\Database\Mysql\Select;

use PDO;

use Src\Contracts\Support\Database\Drivers\Select\Select as SelectInterface;

use Src\Support\Database\Builder;

class Select extends Builder implements SelectInterface
{





    public function __construct(string $Table, array $Columns = ['*'])
    {
        $Columns = implode(',', $Columns);

        $this->addToQuery("SELECT $Columns FROM $Table");
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
    public function where(string $Column, string $Sign = '=', string $Value = '1', int $Type = PDO::PARAM_STR): Select
    {
        $Multiply = str_contains($this->getQuery(), 'WHERE') ? "AND" : "WHERE";

        $this->addToQuery("$Multiply $Column $Sign ?")->addBind($Value, $Type);

        return $this;
    }





    /**
     * Add order by to query
     *
     * @param  mixed $Column Column for sort
     * @param  mixed $Method Sort method
     * @return Select
     */
    public function orderBy(string $Column, string $Method = 'DESC'): Select
    {
        $this->addToQuery("ORDER BY $Column $Method");

        return $this;
    }





    /**
     * Execute query
     *
     * @return void
     */
    public function run()
    {
        return $this->build()->execute()->fetchAll(PDO::FETCH_ASSOC);
    }
}
