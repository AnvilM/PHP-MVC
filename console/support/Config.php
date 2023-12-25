<?php

namespace Console\Support;

use Console\Contracts\Support\Config as SupportConfig;

class Config implements SupportConfig
{


    //Get config
    public static function get(string $config): array
    {
        return require_once ROOT . "/console/config/{$config}.php";
    }
}
