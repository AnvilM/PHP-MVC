<?php


namespace src\controllers;

use mysqli;
use src\core\Controller;
use src\core\Model;

Class HomeController extends Controller{

    public function IndexAction(){
        
   
        $this->View->render();
    }   
} 