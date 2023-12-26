<?php

namespace Src\Contracts\Support\Route;

use Src\Support\Route\Builder as SupportRouteBuilder;

interface Builder
{

    public function Add(string $Param, string $Value): SupportRouteBuilder;

    public function AddArray(string $Param, string $Value): SupportRouteBuilder;

    public function Complete(): void;

    public function getRoutes(): array;
}
