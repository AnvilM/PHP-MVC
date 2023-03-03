<?php

namespace app\core;

class View{

    public $params = [];

    function __construct($params){
        $this->params = $params;
    }

    public function render($vars){
        $view = 'app/views/'.$this->params['Controller'].'/'.$this->params['View'].'.php';
        if(file_exists($view)){
            $title = $this->params['Title'];

            ob_start();
            require $view;
            $view = ob_get_clean();

            require 'app/views/Layout/'.$this->params['Layout'].'.php';
        }
        else{
            header('Location: /Error/404');
        }
    }
}