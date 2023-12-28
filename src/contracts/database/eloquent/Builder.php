<?php

namespace Src\Contracts\Database\Eloquent;

use mysqli_result;

interface Builder
{
    public function build(): mysqli_result | bool;
}
