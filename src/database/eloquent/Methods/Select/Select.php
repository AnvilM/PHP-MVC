<?php

namespace Src\Database\Eloquent\Methods\Select;

use Src\Contracts\Database\Eloquent\Methods\Select\Select as SelectInterface;
use Src\Database\Eloquent\Builder;

class Select extends Builder implements SelectInterface
{





    public function __construct(string $Table, array $Fields = ['*'])
    {
        $this->Query = "SELECT * FROM $Table";

        $Fields = implode(',', $Fields);

        $this->Query = str_replace('Table', $Table, $this->Query);

        $this->Query = str_replace('*', $Fields, $this->Query);
    }





    /**
     * Add WHERE to mysqli query
     *
     * @param  mixed $WhereQuery WHERE Query
     * @return Select
     */
    public function where(string $WhereQuery = 'WHERE 1'): Select
    {
        $this->Query = $this->Query . " WHERE $WhereQuery ";

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
        $this->Query = $this->Query . " ORDER BY $Field $Method";

        return $this;
    }





    public function get(): array
    {
        return $this->build()->fetch_all(MYSQLI_ASSOC);
    }
}
