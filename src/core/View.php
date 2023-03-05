<?php

namespace src\core;

class View{

    public $params = [];

    function __construct($params){
        $this->params = $params;
    }

    public function render($vars=[]){
        $view = 'src/views/'.$this->params['Controller'].'/'.$this->params['View'].'.php';
        if(file_exists($view)){
            $title = $this->params['Title'];

            ob_start();
            require $view;
            $view = ob_get_clean();

            require 'src/views/Layout/'.$this->params['Layout'].'.php';
        }
        else{
            header('Location: /Error/404');
        }
    }

    public static function error($code){
        http_response_code($code);
        require $_SERVER['DOCUMENT_ROOT'].'/src/views/Error/'.$code.'.php';
        exit();
    }
}