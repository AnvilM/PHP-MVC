<?php

return
    [
        [
            "URI" => '/home/{id}/biba/{anus}',
            "Method" => 'GET',
            "Controller" => "App\Controllers\HomeController",
            "Action" => "IndexAction",
            "Middleware" => [
                'App\Middlewares\HomeMiddleware'
            ]
        ]
    ];
