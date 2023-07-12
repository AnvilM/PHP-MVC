<?php

namespace src\core;

use Smarty;

class View{

    public $params = [];

    function __construct($params){
        $this->params = $params;
    }

    public function render($vars=[]){
        $view = $GLOBALS['ROOT'].'resources/views/'.$this->params['Controller'].'/'.$this->params['View'].'.tpl';
        if(file_exists($view)){
        
        

            
            require_once $GLOBALS['ROOT'].'libs/smarty/libs/Smarty.class.php';
            $Smarty = new Smarty();
            $Smarty->setTemplateDir($GLOBALS['ROOT'].'resources/views');
            $Smarty->setCompileDir($GLOBALS['ROOT'].'compiled');
            $Smarty->setCacheDir($GLOBALS['ROOT'].'cache');

            $Smarty->assign('vars', $vars);

            $Smarty->display($this->params['Controller'].'/'.$this->params['View'].'.tpl');
           
            
            
            
        }
        else{
            header('Location: /Error/404');
        }

        
    }





    
    

}