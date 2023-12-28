<?php

namespace Src\Contracts\Database\Eloquent\Methods\Insert;

use mysqli_result;
use Src\Database\Eloquent\Methods\Insert\Insert as EloquentMethodsInsertInsert;

interface Insert
{
    public function __construct(string $Table);

    public function set(string $Field, string $Value): EloquentMethodsInsertInsert;

    public function save(): mysqli_result | bool;
}
