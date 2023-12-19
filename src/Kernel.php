<?php

namespace Src;

use Src\Core\Middleware;
use Src\Core\Router;

class Kernel
{

    private array $params;

    public array $request;





    /**
     * Construct
     *
     * @return void
     */
    public function __construct()
    {
        //Generate request array
        $this->request = $this->request();

        //Load Router
        $Router = new Router($this->request);

        //Get route params from Router class
        $this->params = $Router->params;

        //Load Middlewares
        $this->loadMiddleware();

        //Load Controller
        $this->loadController();
    }





    /**
     * Load Middleware
     *
     * @return void
     */
    private function loadMiddleware(): void
    {
        $Middleware = new Middleware($this->params);
    }





    /**
     * Load Controller
     *
     * @return void
     */
    public function loadController(): void
    {
        //Load controller
        $Controller = new $this->params['Controller']($this->params);

        $action = $this->params['Action'];

        $Controller->$action($this->request);
    }





    /**
     * Generate request array
     *
     * @return array
     */
    private function request(): array
    {
        $request['route'] = $_SERVER['REQUEST_URI'];

        $request['method'] = $_SERVER['REQUEST_METHOD'];

        $request['ip'] = $_SERVER['REMOTE_ADDR'];

        return $request;
    }
}
