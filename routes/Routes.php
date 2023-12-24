<?php

return
    [
        [
            "URI" => '/home',
            "Method" => 'GET',
            "Controller" => "App\Controllers\HomeController",
            "Action" => "IndexAction",
            "Middleware" => [
                'App\Middlewares\HomeMiddleware'
            ]
        ]
    ];
