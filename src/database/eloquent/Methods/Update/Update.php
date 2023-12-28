<?php

namespace Src\Database\Eloquent\Methods\Update;

use mysqli_result;
use Src\Contracts\Database\Eloquent\Methods\Update\Update as UpdateInterface;
use Src\Database\Eloquent\Builder;

class Update extends Builder implements UpdateInterface
{





    public function __construct(string $Table)
    {
        $this->Query = "UPDATE $Table SET";

        $this->Query = str_replace('Table', $Table, $this->Query);
    }





    /**
     * Add SET field and value to mysqli query
     *
     * @param  mixed $Field Field
     * @param  mixed $Value Value
     * @return Update
     */
    public function set(string $Field, string $Value): Update
    {
        $this->Query = $this->Query . " $Field = '$Value' ";

        return $this;
    }





    /**
     * Add WHERE to mysqli query
     *
     * @param  mixed $WhereQuery WHERE Query
     * @return Update
     */
    public function where(string $WhereQuery): Update
    {
        $this->Query = $this->Query . " WHERE $WhereQuery ";
        return $this;
    }





    /**
     * Save and execute query
     *
     * @return mysqli_result | bool
     */
    public function save(): mysqli_result | bool
    {
        return $this->build();
    }
}
