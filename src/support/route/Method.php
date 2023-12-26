<?php

namespace Src\Support\Route;

use Src\Contracts\Support\Route\Method as ContractsSupportRouteMethod;

class Method implements ContractsSupportRouteMethod
{
    //Builder
    private Builder $Builder;

    //Components
    public Components $Components;





    public function __construct(Builder $Builder)
    {
        $this->Builder = $Builder;

        $this->Components = new Components($this->Builder);
    }





    /**
     * Add get route to route
     *
     * @param  mixed $Route Route
     * 
     * @return Components
     */
    public function Get(string $Route): Components
    {
        $this->Builder
            ->Add('Method', 'GET')
            ->Add('URI', $Route);

        return $this->Components;
    }





    /**
     * Add get route to route
     *
     * @param  mixed $Route Route
     * 
     * @return Components
     */
    public function Post(string $Route): Components
    {
        $this->Builder
            ->Add('Method', 'GET')
            ->Add('URI', $Route);

        return $this->Components;
    }
}
