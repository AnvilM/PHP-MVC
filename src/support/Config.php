<?php

namespace Src\Support;

use Src\Contracts\Support\Config as ContractsSupportConfig;

class Config implements ContractsSupportConfig
{
    //Get config
    public static function get(string $config): array
    {
        return require_once ROOT . "/config/{$config}.php";
    }
}
