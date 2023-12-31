<?php

namespace Src\Contracts\Support\Database\Drivers\Select;

use PDO;


interface Select
{





    public function __construct(string $Table, array $Fields = ['*']);





    /**
     * Add Where to query
     *
     * @param  mixed $Column Colmn
     * @param  mixed $Sign Sign (+, -, >, <, =)
     * @param  mixed $Value Value
     * @param  mixed $Type Value data type
     * @return Select
     */
    public function where(string $Column, string $Sign = '=', string $Value = '1', int $Type = PDO::PARAM_STR): Select;





    /**
     * Add order by to query
     *
     * @param  mixed $Column Column for sort
     * @param  mixed $Method Sort method
     * @return Select
     */
    public function orderBy(string $Column, string $Method = 'DESC'): Select;





    /**
     * Execute query
     *
     * @return void
     */
    public function run();
}
