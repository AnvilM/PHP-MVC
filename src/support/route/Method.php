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
     * Add GET route to routes
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
     * Add POST route to routes
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





    /**
     * Add PUT route to routes
     *
     * @param  mixed $Route Route
     * 
     * @return Components
     */
    public function Put(string $Route): Components
    {
        $this->Builder
            ->Add('Method', 'GET')
            ->Add('URI', $Route);

        return $this->Components;
    }





    /**
     * Add PATCH route to routes
     *
     * @param  mixed $Route Route
     * 
     * @return Components
     */
    public function Patch(string $Route): Components
    {
        $this->Builder
            ->Add('Method', 'GET')
            ->Add('URI', $Route);

        return $this->Components;
    }





    /**
     * Add DELETE route to routes
     *
     * @param  mixed $Route Route
     * 
     * @return Components
     */
    public function Delete(string $Route): Components
    {
        $this->Builder
            ->Add('Method', 'GET')
            ->Add('URI', $Route);

        return $this->Components;
    }
}
