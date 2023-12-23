<?php

namespace Src\Core;

use ErrorException;

class Middleware
{
    private array $Route = [];





    public function __construct(array $Route)
    {
        $this->Route = $Route;

        $this->loadMiddlewares();
    }





    //Load Middlewares
    private function loadMiddlewares()
    {
        if (count($this->Route['Middleware']) >= 1)
        {
            foreach ($this->Route['Middleware'] as $Middleware)
            {
                if (class_exists($Middleware))
                {
                    $Middleware = new $Middleware;
                }
            }
        }
    }
}
