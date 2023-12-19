<?php

return
    [
        [
            "Route" => '/Home',
            "Method" => 'GET',
            "Controller" => "App\Controllers\HomeController",
            "Action" => "IndexAction",
            "Middleware" => [
                'App\Middlewares\HomeMiddleware'
            ]
        ]
    ];
