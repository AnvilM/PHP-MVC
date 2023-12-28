<?php

namespace Src\Contracts\Database\Eloquent\Methods\Select;

use mysqli_result;
use Src\Database\Eloquent\Methods\Select\Select as EloquentMethodsSelectSelect;

interface Select
{
    public function __construct(string $Table, array $Fields = ['*']);

    public function where(string $WhereQuery = 'WHERE 1'): EloquentMethodsSelectSelect;

    public function orderBy(string $Field, string $Method = 'DESC'): EloquentMethodsSelectSelect;

    public function get(): array;
}
