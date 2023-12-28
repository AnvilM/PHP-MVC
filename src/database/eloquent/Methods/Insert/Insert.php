<?php

namespace Src\Database\Eloquent\Methods\Insert;

use mysqli_result;
use Src\Contracts\Database\Eloquent\Methods\Insert\Insert as InsertInterface;
use Src\Database\Eloquent\Builder;

class Insert extends Builder implements InsertInterface
{
    private array $Fields;

    private array $Values;





    public function __construct(string $Table)
    {
        $this->Query = "INSERT INTO $Table (({!})) VALUES (({?}))";
    }





    /**
     * Add SET Field and Value to mysqli query
     *
     * @param  mixed $Field Field
     * @param  mixed $Value Valud
     * @return Insert
     */
    public function set(string $Field, string $Value): Insert
    {
        $this->Fields[] = $Field;
        $this->Values[] = $Value;

        return $this;
    }





    /**
     * Save and execute mysqli query
     *
     * @return mysqli_result | bool
     */
    public function save(): mysqli_result | bool
    {
        $Fields = implode(',', $this->Fields);
        $Values = "'" . implode("','", $this->Values) . "'";

        $this->Query = str_replace('({!})', $Fields, $this->Query);
        $this->Query = str_replace('({?})', $Values, $this->Query);

        return $this->build();
    }
}
