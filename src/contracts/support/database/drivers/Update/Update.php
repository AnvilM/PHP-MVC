<?php

namespace Src\Contracts\Support\Database\Drivers\Update;

use PDO;

interface Update
{





    public function __construct(string $Table);






    /**
     * Set new values
     *
     * @param  mixed $Column Column for new value
     * @param  mixed $Value New value
     * @param  mixed $Type Value data type
     * @return Update
     */
    public function set(string $Column, string $Value, int $Type = PDO::PARAM_STR): Update;





    /**
     * Add Where to query
     *
     * @param  mixed $Column Colmn
     * @param  mixed $Sign Sign (+, -, >, <, =)
     * @param  mixed $Value Value
     * @param  mixed $Type Value data type
     * @return Select
     */
    public function where(string $Column, string $Sign = '=', string $Value = '1', int $Type = PDO::PARAM_STR): Update;





    /**
     * Execute query
     *
     * @return void
     */
    public function run();
}
