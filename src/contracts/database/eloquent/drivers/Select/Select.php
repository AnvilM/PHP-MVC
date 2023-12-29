<?php

namespace Src\Contracts\Database\Eloquent\Drivers\Select;

use PDO;


interface Select
{





    public function __construct(string $Table, array $Fields = ['*']);





    public function where(string $Field, string $Sign = '=', string $Value = '1', int $Type = PDO::PARAM_STR): Select;





    public function orderBy(string $Field, string $Method = 'DESC'): Select;





    public function run();
}
