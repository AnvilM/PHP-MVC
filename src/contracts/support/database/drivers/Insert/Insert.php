<?php

namespace Src\Contracts\Support\Database\Drivers\Insert;

use PDO;

interface Insert
{

    public function __construct(string $Table);





    /**
     * Set value for insert
     *
     * @param  mixed $Column Insert column
     * @param  mixed $Value Insert value
     * @param  mixed $Type Value data type
     * @return Insert
     */
    public function set(string $Column, string $Value, int $Type = PDO::PARAM_STR): Insert;






    /**
     * Execute query
     *
     * @return void
     */
    public function run();
}
