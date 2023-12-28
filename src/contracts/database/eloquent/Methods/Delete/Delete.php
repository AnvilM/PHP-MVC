<?php

namespace Src\Contracts\Database\Eloquent\Methods\Delete;

use mysqli;
use mysqli_result;
use Src\Database\Eloquent\Methods\Delete\Delete as EloquentMethodsDeleteDelete;

interface Delete
{
    public function __construct(string $Table);

    public function where(string $WhereQuery = 'WHERE 1'): EloquentMethodsDeleteDelete;

    public function save(): mysqli_result | bool;
}
