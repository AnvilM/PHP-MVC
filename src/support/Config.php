<?php

namespace Src\Support;

use Src\Contracts\Config as ContractsConfig;

class Config implements ContractsConfig
{
    //Get config
    public static function get(string $config): array
    {
        return require_once ROOT . "/config/{$config}.php";
    }
}
