<?php

namespace src\core;

use src\core\View;
use src\lib\Env;

abstract class Controller{

    public $View;
    public $Model;
    public $params;
    public $Env;

    function __construct($params){
        
        $this->params = $params;

        $this->loadMiddleware();
        $this->Model = $this->loadModel($params['Controller']);

        $this->Env = new Env();
    
        $this->View = new View($params);
        
        
    }



    public function loadModel($model_name){
        $model_path = 'src\models\\'.$model_name.'Model';
        if(class_exists($model_path)){
            return new $model_path;
        }
    }

    public function loadMiddleware(){
        if(key_exists('Middlewares', $this->params) && count($this->params['Middlewares']) > 0){
            for($i=0; $i < count($this->params['Middlewares']); $i++){
                $middlewarepath = 'src\middlewares\\'.$this->params['Middlewares'][$i].'Middleware';
                $middleware = new $middlewarepath;
            }
        }
    }


    
   

}
