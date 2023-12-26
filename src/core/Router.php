<?php

namespace Src\Core;

use Src\Support\Request;

class Router
{
    private array $Routes = [];

    public array $Route = [];

    public bool $Match = false;





    //Get routes and find matches
    public function __construct()
    {
        $this->Routes = require ROOT . '/routes/Routes.php';

        $this->Match = $this->match();
    }





    //find routes matches
    private function match()
    {
        if ($this->uri_method())
        {
            if ($this->controller())
            {
                if ($this->action())
                {
                    return true;
                }
                else
                {
                    debug('1');
                }
            }
            else
            {
                debug('2');
            }
        }
        else
        {
            debug('3');
        }
    }





    //find routes by uri and request methods
    private function uri_method()
    {
        foreach ($this->Routes as $Route)
        {
            $route_uri = explode('/', $Route['URI']);
            $request_uri = explode('/', Request::uri());


            if (count($route_uri) != count($request_uri))
            {
                return false;
            }

            $breaked = false;

            for ($i = 0; $i < count($route_uri); $i++)
            {


                if ($route_uri[$i] != $request_uri[$i] && !preg_match('/(^{+[a-z]+}$)/', $route_uri[$i]))
                {
                    $breaked = true;
                    break;
                }
            }

            if ($breaked)
            {
                continue;
            }

            $this->Route = $Route;
            return true;
        }
        return false;
    }





    //Checks if controller exists
    private function controller()
    {
        return class_exists($this->Route['Controller']) ? true : false;
    }





    //Checks if action exists
    private function action()
    {
        return method_exists($this->Route['Controller'], $this->Route['Action']) ? true : false;
    }
}
