<?php

namespace src\lib;

class Env{

    protected $db;

    public static function get($param){
        $env = require $GLOBALS['ROOT'].'/src/env.php';
        return key_exists($param, $env) ? $env[$param] : 'key '.$param.' doesn\'t exist';
    }
    
}
