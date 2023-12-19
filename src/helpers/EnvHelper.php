<?php

namespace Src\Helpers;

use ErrorException;

class EnvHelper
{
    public static function get(string $key, string $default = "")
    {
        $Env = json_decode(file_get_contents('../env.json'), true);

        if (key_exists($key, $Env))
        {
            return $Env[$key];
        }

        return $default == "" ? throw new ErrorException("Key {$key} does not exist") : $default;
    }
}
