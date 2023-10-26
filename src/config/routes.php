<?php


$routes = [
    [
        'Route' => '',
        'Controller' => 'Home',
        'Action' => 'Index',
        'Layout' => 'Default',
        'View' => 'Index',
        'Title' => 'Главная',
        'Middlewares' => [
            'Auth'
        ]
    ],
   

];

return $routes;
