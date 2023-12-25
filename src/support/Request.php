<?php

namespace Src\Support;

use Src\Contracts\Request as ContractsRequest;

class Request implements ContractsRequest
{
    /**
     * Get URI
     *
     * @return string
     */
    public static function uri(): string
    {
        return $_SERVER['REQUEST_URI'];
    }





    /**
     * Get request method
     *
     * @return string
     */
    public static function method(): string
    {
        return $_SERVER['REQUEST_METHOD'];
    }





    /**
     * Get GET params
     *
     * @return array
     */
    public static function get(): array
    {
        return $_GET;
    }





    /**
     * Get post params
     *
     * @return array
     */
    public static function post(): array
    {
        return $_POST;
    }





    /**
     * Get param from route
     *
     * @param  mixed $param - Route param
     * @param  mixed $default - Default value
     * @return string
     */
    public static function route($param, $default = ''): string
    {

        $param = '{' . $param . '}';

        $Routes = require ROOT . '/routes/Routes.php';

        foreach ($Routes as $Route)
        {
            $route_uri = explode('/', $Route['URI']);
            $request_uri = explode('/', $_SERVER['REQUEST_URI']);


            if (count($route_uri) != count($request_uri))
            {
                break;
            }

            for ($i = 0; $i < count($route_uri); $i++)
            {


                if ($route_uri[$i] != $request_uri[$i] && !preg_match('/(^{+[a-z]+}$)/', $route_uri[$i]))
                {
                    break;
                }
            }
        }

        if (in_array($param, $route_uri))
        {
            return $request_uri[array_search($param, $route_uri)];
        }
        else
        {
            return $default;
        }
    }
}
