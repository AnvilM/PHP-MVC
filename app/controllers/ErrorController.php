<?php


namespace app\controllers;

use app\core\Controller;


Class ErrorController extends Controller{

    public function Error404Action($params){
        $this->view->render([]);
        
    }
} 