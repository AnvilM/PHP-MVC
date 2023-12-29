<?php

namespace Src\Contracts\Database\Eloquent\Drivers\Delete;

use PDO;

interface Delete
{



    public function __construct(string $Table);





    public function where(string $Field, string $Sign = '=', string $Value = '1', int $Type = PDO::PARAM_STR): Delete;





    public function run();
}
