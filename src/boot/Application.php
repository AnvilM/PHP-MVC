<?php

namespace Src\Boot;

use Src\Core\Router;
use Src\Core\Middleware;


class Application
{
    private Router $Router;

    private Middleware $Middleware;

    private array $Route = [];





    //Start application
    public function make()
    {
        $this->Router = new Router;

        $this->Route = $this->Router->Route;

        $this->Middleware = new Middleware($this->Route);

        $this->Controller();
    }





    //Load Controller
    private function Controller()
    {
        $Controller = new $this->Route['Controller'];

        $Action = $this->Route['Action'];

        $Controller->$Action();
    }
}
