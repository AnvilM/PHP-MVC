<?php

namespace Src\Support\Database\Mysql\Update;

use PDO;

use Src\Contracts\Support\Database\Drivers\Update\Update as UpdateInterface;

use Src\Support\Database\Builder;

class Update extends Builder implements UpdateInterface
{





    public function __construct(string $Table)
    {
        $this->addToQuery("UPDATE $Table SET");
    }






    /**
     * Set new values
     *
     * @param  mixed $Column Column for new value
     * @param  mixed $Value New value
     * @param  mixed $Type Value data type
     * @return Update
     */
    public function set(string $Column, string $Value, int $Type = PDO::PARAM_STR): Update
    {
        $Multiply = substr_count($this->getQuery(), '=') > 0 ? "," : "";

        $this->addToQuery("$Multiply$Column = ?")->addBind($Value, $Type);

        return $this;
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
    public function where(string $Column, string $Sign = '=', string $Value = '1', int $Type = PDO::PARAM_STR): Update
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
        return $this->build()->execute()->fetchAll(PDO::FETCH_ASSOC);
    }
}
