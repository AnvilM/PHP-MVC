<?php

namespace app\core;
use app\core\Controller;



Class Router{
    public $routes = [];
    public $params = [];

    function __construct(){
        $this->routes = require_once $_SERVER['DOCUMENT_ROOT'].'\app\config\routes.php';
        
        if($this->match() === true){
            $controller_path = 'app\controllers\\'.$this->params['Controller'].'Controller';
            if(class_exists($controller_path)){
                $action = $this->params['Action'].'Action';
                if(method_exists($controller_path, $action)){
                    $controller = new $controller_path($this->params);
                    $controller->$action($this->params);            
                }else{
                    header('Location: /Error/404');
                    
                }
            }else{
                header('Location: /Error/404');
                
            }
            
        }else{
            header('Location: /Error/404');
        }
    }
   



    function match(){
        foreach($this->routes as $a){
            if(strtolower($a['Route']) == trim(strtolower($_SERVER['REQUEST_URI']), '/')){
                $this->params = $a;
                return true;
            } 

        }
        return false;
    }
}