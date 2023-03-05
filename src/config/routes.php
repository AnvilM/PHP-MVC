<?php


$routes = [
    [
        'Route' => '',
        'Controller' => 'Home',
        'Action' => 'Index',
        'Layout' => 'Default',
        'View' => 'Index',
        'Title' => 'Главная'
    ],
    [
        'Route' => 'Account/Login',
        'Controller' => 'Account',
        'Action' => 'login',
        'Layout' => 'Default',
        'View' => 'Login',
        'Title' => 'Главная'
    ],
    [
        'Route' => 'Account/Signup',
        'Controller' => 'Account',
        'Action' => 'Signup',
        'Layout' => 'Default',
        'View' => 'Signup',
        'Title' => 'Главная'
    ],
    [
        'Route' => 'Error/404',
        'Controller' => 'Error',
        'Action' => 'Error404',
        'Layout' => 'Default',
        'View' => 'Error404',
        'Title' => 'Ошибка'
    ],
    
];

return $routes;
