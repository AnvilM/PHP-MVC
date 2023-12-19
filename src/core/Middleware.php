<?php

namespace Src\Core;

use ErrorException;

class Middleware
{
    private array $params;

    public function __construct(array $params)
    {
        $this->params = $params;

        $this->loadMiddlewares();
    }

    private function loadMiddlewares()
    {
        $Middlewares = $this->params['Middleware'];

        if (count($Middlewares) >= 1)
        {
            foreach ($Middlewares as $Middleware)
            {
                if (class_exists($Middleware))
                {
                    $Middleware = new $Middleware();
                }
                else
                {
                    throw new ErrorException("Middleware {$Middleware} does not exist");
                }
            }
        }
    }
}
