<?php

namespace Src\Support\Database\Mysql\Insert;

use PDO;

use Src\Contracts\Support\Database\Drivers\Insert\Insert as InsertInterface;

use Src\Support\Database\Builder;

class Insert implements InsertInterface
{
    private Builder $Builder;

    private array $Columns;

    private array $Values;





    public function __construct(string $Table)
    {
        $this->Builder = new Builder;

        $this->Builder->addToQuery("INSERT INTO $Table");
    }





    /**
     * Set value for insert
     *
     * @param  mixed $Column Insert column
     * @param  mixed $Value Insert value
     * @param  mixed $Type Value data type
     * @return Insert
     */
    public function set(string $Column, string $Value, int $Type = PDO::PARAM_STR): Insert
    {
        $this->Columns[] = $Column;
        $this->Values[] = $Value;

        $this->Builder->addBind($Value, $Type);

        return $this;
    }






    /**
     * Execute query
     *
     * @return void
     */
    public function run()
    {
        $Columns = implode(',', $this->Columns);

        $Values = '';
        $FilledValues = str_pad($Values, count($this->Columns) * 2, '?,');
        $Values = substr($FilledValues, 0, -1);

        $this->Builder->addToQuery("(" . $Columns . ")")
            ->addToQuery("VALUES")
            ->addToQuery("(" . $Values . ")");






        return $this->Builder->build()->execute();
    }
}
