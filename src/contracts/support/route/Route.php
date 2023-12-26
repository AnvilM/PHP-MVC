<?php

namespace Src\Contracts\Support\Route;

use Src\Support\Route\Method;

interface Route
{
    public function Add(): Method;




    public function getRoutes(): array;
}
