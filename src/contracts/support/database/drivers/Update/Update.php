<?php

namespace Src\Contracts\Support\Database\Drivers\Update;

use PDO;

interface Update
{





    public function __construct(string $Table);






    public function set(string $Field, string $Value, int $Type = PDO::PARAM_STR): Update;





    public function where(string $Field, string $Sign = '=', string $Value = '1', int $Type = PDO::PARAM_STR): Update;





    public function run();
}
