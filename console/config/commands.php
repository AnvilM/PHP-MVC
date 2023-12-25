<?php

use Console\Commands\Make\Controller;
use Console\Commands\Make\Middleware;
use Console\Commands\Make\Model;
use Console\Commands\Serve;
use Console\Commands\Printr;

return [
    [
        'Name' => 'printr',
        'Class' => Printr::class
    ],

    [
        'Name' => 'make:controller',
        'Class' => Controller::class
    ],

    [
        'Name' => 'make:model',
        'Class' => Model::class
    ],

    [
        'Name' => 'make:middleware',
        'Class' => Middleware::class
    ],

    [
        'Name' => 'serve',
        'Class' => Serve::class
    ]
];
