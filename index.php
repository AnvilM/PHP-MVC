<?php
session_start();
date_default_timezone_set('Europe/Moscow');
ini_set('display_errors', 1);
error_reporting(E_ALL);

use src\core\Router;


spl_autoload_register(function ($class) {
    $path = str_replace('\\', '/', $class.'.php');
    if(file_exists($path)){
        require $path;
        
    } 
});

$Router = new Router();





