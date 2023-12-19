<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);


require_once dirname(__DIR__) . '/vendor/autoload.php';


use Src\Kernel;

$Kernel = new Kernel();
