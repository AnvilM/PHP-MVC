<?php

use Console\Commands\Make\Controller;
use Console\Commands\Printr;

return [
    [
        'Name' => 'printr',
        'Class' => Printr::class
    ],

    [
        'Name' => 'make:controller',
        'Class' => Controller::class
    ]
];
