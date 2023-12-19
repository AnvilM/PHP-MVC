<?php

namespace Src\Core;

use ErrorException;

class Router
{
    private array $routes;

    public array $params;

    private array $request;




    /**
     * Construct method
     *
     * @return array
     */
    public function __construct(array $request)
    {
        //Set request array
        $this->request = $request;

        //Load routes
        $this->routes = require_once(dirname(__DIR__) . '../routes/routes.php');


        //Checks if route, controller and action is true
        $this->control();
    }





    /**
     * Check route
     *
     * @param  string $uri Request URI
     * @param  string $method Request method
     * @return bool
     */
    private function route(): bool
    {

        foreach ($this->routes as $params)
        {
            if ($params["Route"] === $this->request['route'] && $params["Method"] === $this->request['method'])
            {
                $this->params = $params;
                return true;
            }
        }

        return false;
    }





    /**
     * Checks if controller eixsts
     *
     * @return bool
     */
    private function controller(): bool
    {
        return class_exists($this->params['Controller']) ? true : false;
    }





    /**
     * Checks if action method exists
     *
     * @return bool
     */
    private function action(): bool
    {
        return method_exists($this->params['Controller'], $this->params['Action']) ? true : false;
    }





    /**
     * Checks if route, controller and action is true and throw exception
     *
     * @param  bool $route
     * @param  bool $controller
     * @param  bool $action
     * @return bool
     */
    private function control(): bool
    {

        if ($this->route())
        {
            if ($this->controller())
            {
                if ($this->action())
                {
                    return true;
                }
                else
                {
                    throw new ErrorException("Action {$this->params['Action']} does not exist");
                }
            }
            else
            {
                throw new ErrorException("Controller {$this->params['Controller']} does not exist");
            }
        }
        else
        {
            throw new ErrorException("Route {$this->request['route']} does not exist");
        }
        return false;
    }
}
