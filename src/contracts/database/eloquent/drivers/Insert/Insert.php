<?php

namespace Src\Contracts\Database\Eloquent\Drivers\Insert;

use PDO;

interface Insert
{

    public function __construct(string $Table);





    public function set(string $Field, string $Value, int $Type = PDO::PARAM_STR): Insert;






    public function run();
}
