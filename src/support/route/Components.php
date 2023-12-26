<?php

namespace Src\Support\Route;

use Src\Contracts\Support\Route\Components as ContractsSupportRouteComponents;

class Components implements ContractsSupportRouteComponents
{
    //Builder
    private Builder $Builder;





    public function __construct(Builder $Builder)
    {
        $this->Builder = $Builder;
    }





    /**
     * Add a controller to route
     *
     * @param  string $Controller Controller for adding
     * @param  string $Action Controller action
     * 
     * @return Components
     */
    public function Controller(string $Controller, string $Action = ''): Components
    {
        if ($Action == '')
        {
            $this->Builder->Add('Controller', $Controller);
        }
        else
        {
            $this->Builder
                ->Add('Controller', $Controller)
                ->Add('Action', $Action);
        }


        return $this;
    }





    /**
     * Add an action to route
     *
     * @param  mixed $Action Action for adding
     * @return Components
     */
    public function Action(string $Action): Components
    {
        $this->Builder->Add('Action', $Action);

        return $this;
    }
}
