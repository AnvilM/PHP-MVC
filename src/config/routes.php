<?php


$routes = [
    [
        'Route' => '/home',
        'Controller' => 'Home',
        'Action' => 'Index',
        'View' => 'Index',
        'Middlewares' => [
            'Auth'
        ]
    ],


];

return $routes;
