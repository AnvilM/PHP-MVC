<?php

namespace Src\Contracts\Support;

interface Config
{
    public static function get(string $config): array;
}
