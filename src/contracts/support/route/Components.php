<?php

namespace Src\Contracts\Support\Route;

use Src\Support\Route\Components as SupportRouteComponents;

interface Components
{
    public function controller(string $Controller, string $Action = ''): SupportRouteComponents;

    public function action(string $Action): SupportRouteComponents;
}
