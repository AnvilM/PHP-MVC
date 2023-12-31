<?php

namespace Src\Contracts\Support\Database\Drivers\Delete;

use PDO;

interface Delete
{



    public function __construct(string $Table);





    /**
     * Add Where to query
     *
     * @param  mixed $Column Colmn
     * @param  mixed $Sign Sign (+, -, >, <, =)
     * @param  mixed $Value Value
     * @param  mixed $Type Value data type
     * @return Select
     */
    public function where(string $Column, string $Sign = '=', string $Value = '1', int $Type = PDO::PARAM_STR): Delete;





    /**
     * Execute query
     *
     * @return void
     */
    public function run();
}
