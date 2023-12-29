<?php

namespace Src\Database\Eloquent\Mysql\Update;

use PDO;

use Src\Contracts\Database\Eloquent\Drivers\Update\Update as UpdateInterface;

use Src\Database\Eloquent\Builder;

class Update extends Builder implements UpdateInterface
{





    public function __construct(string $Table)
    {
        $this->addToQuery("UPDATE $Table SET");
    }






    public function set(string $Field, string $Value, int $Type = PDO::PARAM_STR): Update
    {
        $Multiply = substr_count($this->getQuery(), 'WHERE' > 1) ? "," : "";

        $$this->addToQuery("$Multiply$Field = ?")->addBind($Value, $Type);

        return $this;
    }





    public function where(string $Field, string $Sign = '=', string $Value = '1', int $Type = PDO::PARAM_STR): Update
    {
        $Multiply = str_contains($this->getQuery(), 'WHERE') ? "AND" : "WHERE";

        $this->addToQuery("$Multiply $Field $Sign ?")->addBind($Value, $Type);

        return $this;
    }





    public function run()
    {
        return $this->build()->execute()->fetchAll(PDO::FETCH_ASSOC);
    }
}
