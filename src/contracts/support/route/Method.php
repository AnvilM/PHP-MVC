<?php

namespace Src\Contracts\Support\Route;

use Src\Support\Route\Components;

interface Method
{
    public function get(string $Route): Components;
}
