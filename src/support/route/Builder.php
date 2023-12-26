<?php

namespace Src\Support\Route;

use Src\Contracts\Support\Route\Builder as ContractsSupportRouteBuilder;

class Builder implements ContractsSupportRouteBuilder
{
    // All added routes
    private array $Routes = [];

    // Current route
    private array $Route = [];





    /**
     * Add param to route
     *
     * @param  string $Param Parameter for adding
     * @param  string $Value Parameter value
     * 
     * @return Builder
     */
    public function Add(string $Param, string $Value): Builder
    {
        $this->Route[$Param] = $Value;

        return $this;
    }





    /**
     * Complete route
     *
     * @return void
     */
    public function Complete(): void
    {
        if (count($this->Route) > 0)
        {
            $this->Routes[] = $this->Route;
        }
    }





    /**
     * Get all added routes
     *
     * @return array
     */
    public function GetRoutes(): array
    {
        return $this->Routes;
    }
}
