<?php

namespace Src\Contracts\Support\Database\Drivers\Insert;

use PDO;

interface Insert
{

    public function __construct(string $Table);





    public function set(string $Field, string $Value, int $Type = PDO::PARAM_STR): Insert;






    public function run();
}
