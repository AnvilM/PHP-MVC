<?php

namespace src\core;

use mysqli;
use src\core\View;
use src\lib\User;

abstract class Controller{

    public $View;
    public $Model;
    public $params;
    public $User;

    function __construct($params){
        
        $this->params = $params;
        
        if(!$this->accessCheck()){
            View::error(404);
        }
        $this->User = new User();
        $this->View = new View($params);
        
        $this->Model = $this->loadModel($params['Controller']);
        
    }


    

    



    public function loadModel($model_name){
        $model_path = 'src\models\\'.$model_name.'Model';
        if(class_exists($model_path)){
            return new $model_path;
        }
    }

    public function accessCheck(){
        $access = require $_SERVER['DOCUMENT_ROOT'].'/src/config/accesscontrol.php';
        if(in_array($this->params['Route'], $access['all'])){
            return true;
        }
        else if(in_array($this->params['Route'], $access['noLogined']) &&  !$this->User->isLogined()){
            return true;
        }
        else if(in_array($this->params['Route'], $access['isLogined']) && $this->User->isLogined()){
            return true;
        }
        return false;
    }

    
   

}
