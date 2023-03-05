<?php

namespace src\core;

use src\core\View;

abstract class Controller{

    public $view;
    public $model;
    public $params;
    public $access;

    function __construct($params){

        $this->params = $params;

        if(!$this->accessCheck()){
            View::error(404);
        }

        $this->view = new View($params);
        
        $this->model = $this->loadModel($params['Controller']);
    }

    public function loadModel($model_name){
        $model_path = 'src\models\\'.$model_name.'Model';
        if(class_exists($model_path)){
            return new $model_path;
        }
    }

    public function accessCheck(){
        $this->access = require $_SERVER['DOCUMENT_ROOT'].'/src/config/accesscontrol.php';
        if($this->accessMatch('all')){
            return true;
        }
        else if($this->accessMatch('noLogined') &&  !isset($_SESSION['Login'])){
            return true;
        }
        else if($this->accessMatch('isLogined') && isset($_SESSION['Login'])){
            return true;
        }
        else if ($this->accessMatch('admin') && isset($_SESSION['admin'])){
            return true;
        }
        return false;
    }

    public function accessMatch($key){
        return in_array($this->params['Route'], $this->access[$key]);
    }
   


}
