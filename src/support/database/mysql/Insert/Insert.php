<?php

namespace Src\Support\Database\Mysql\Insert;

use PDO;

use Src\Contracts\Support\Database\Drivers\Insert\Insert as InsertInterface;

use Src\Support\Database\Builder;

class Insert extends Builder implements InsertInterface
{
    private array $Fields;

    private array $Values;





    public function __construct(string $Table)
    {
        $this->addToQuery("INSERT INTO $Table");
    }





    public function set(string $Field, string $Value, int $Type = PDO::PARAM_STR): Insert
    {
        $this->Fields[] = $Field;
        $this->Values[] = $Value;

        $this->addBind($Value, $Type);

        return $this;
    }






    public function run()
    {
        $Fields = implode(',', $this->Fields);

        $Values = '';
        $FilledValues = str_pad($Values, count($this->Fields) * 2, '?,');
        $Values = substr($FilledValues, 0, -1);

        $this->addToQuery("(" . $Fields . ")")
            ->addToQuery("VALUES")
            ->addToQuery("(" . $Values . ")");






        return $this->build()->execute();
    }
}
