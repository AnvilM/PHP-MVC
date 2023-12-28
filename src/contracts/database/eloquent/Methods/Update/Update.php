<?php

namespace Src\Contracts\Database\Eloquent\Methods\Update;

use mysqli_result;
use Src\Database\Eloquent\Methods\Update\Update as EloquentMethodsUpdateUpdate;

interface Update
{
    public function __construct(string $Table);

    public function set(string $Field, string $Value): EloquentMethodsUpdateUpdate;

    public function where(string $WhereQuery): EloquentMethodsUpdateUpdate;

    public function save(): mysqli_result | bool;
}
