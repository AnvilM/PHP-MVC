<?php

namespace Src\Support\Route;

use Src\Contracts\Support\Route\Route as ContractsSupportRouteRoute;

class Route implements ContractsSupportRouteRoute
{
    //Builder
    private Builder $Builder;

    //Method
    private Method $Method;





    public function __construct()
    {
        $this->Builder = new Builder;

        $this->Method = new Method($this->Builder);
    }





    /**
     * Complete previous route and start adding a new route 
     *
     * @return Method
     */
    public function Add(): Method
    {
        $this->Builder->Complete();

        return $this->Method;
    }





    /**
     * Complete last route and return all routes
     *
     * @return array
     */
    public function GetRoutes(): array
    {
        $this->Builder->Complete();

        return $this->Builder->getRoutes();
    }
}
