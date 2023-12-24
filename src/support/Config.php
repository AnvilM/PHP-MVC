<?php

namespace Src\Support;

class Config
{
    //Get config
    public static function get(string $config)
    {
        return require_once ROOT . "/config/{$config}.php";
    }
}
