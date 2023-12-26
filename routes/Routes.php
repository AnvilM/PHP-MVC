<?php

use Src\Support\Route\Route;

use App\Controllers\HomeController;

$Route = new Route();

// Here is where you can register routes for your application. 




$Route->Add()->get('/home')->controller(HomeController::class)->action('IndexAction');





















return $Route->getRoutes();
