<?php

namespace src\core;

use src\core\Controller;
use src\core\View;



Class Router{
    public $routes = [];
    public $params = [];

    function __construct(){
        $this->routes = require_once $_SERVER['DOCUMENT_ROOT'].'\src\config\routes.php';
        
        if($this->match() === true){
            $controller_path = 'src\controllers\\'.$this->params['Controller'].'Controller';
            if(class_exists($controller_path)){
                $action = $this->params['Action'].'Action';
                if(method_exists($controller_path, $action)){
                    $controller = new $controller_path($this->params);
                    $controller->$action();            
                }else{
                    View::error(404);
                }
            }else{
                View::error(404);
            }
        }else{
            View::error(404);
        }
    }
   



    function match(){
        if(str_contains($_SERVER['REQUEST_URI'], '?')){
            $ruri = strstr($_SERVER['REQUEST_URI'], '?', true);
        } else{
            $ruri = $_SERVER['REQUEST_URI'];
        }
        foreach($this->routes as $a){
            if(strtolower($a['Route']) == trim(strtolower($ruri), '/')){
                $this->params = $a;
                
                return true;
            } 

        }
        return false;
    }
}