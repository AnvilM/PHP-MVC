<?php

namespace Src\Database\Eloquent\Methods\Delete;

use mysqli_result;
use Src\Contracts\Database\Eloquent\Methods\Delete\Delete as DeleteInterface;
use Src\Database\Eloquent\Builder;

class Delete extends Builder implements DeleteInterface
{





    public function __construct(string $Table)
    {
        $this->Query = "DELETE FROM $Table";
    }





    /**
     * Add WHERE to mysqli query
     *
     * @param  mixed $WhereQuery WHERE Query
     * @return Delete
     */
    public function where(string $WhereQuery = 'WHERE 1'): Delete
    {
        $this->Query = $this->Query . " WHERE $WhereQuery ";
        return $this;
    }





    /**
     * Save and execute mysqli query
     *
     * @return mysqli_result | bool
     */
    public function save(): mysqli_result | bool
    {
        return $this->build();
    }
}
