<?php

namespace app\core;

use app\core\View;

abstract class Controller{

    public $view;
    function __construct($params){
        
        
        $this->view = new View($params);
    }
   


}
