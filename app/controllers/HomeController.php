<?php


namespace app\controllers;

use app\core\Controller;


Class HomeController extends Controller{

    public function IndexAction($params){
        $this->view->render([]);
        
    }

    public function RedirectAction($params){
        
    }
} 