<?php

use Src\Kernel;





//Define ROOT Directory
define('ROOT', dirname(__DIR__) . DIRECTORY_SEPARATOR);





//Register Composer Auto Loader
require_once ROOT . '/vendor/autoload.php';





//Load Kernel
$Kernel = new Kernel();
