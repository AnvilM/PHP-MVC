<?php

namespace src\lib;

class Env
{

    public static function get($key)
    {
        $env = file_get_contents($GLOBALS['ROOT'] . '/src/env.json');
        $env = json_decode($env, true);
        return key_exists($key, $env) ? $env[$key] : 'key ' . $key . ' doesn\'t exist';
    }
}
