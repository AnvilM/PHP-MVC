<?php

namespace Src\Contracts;

interface Config
{
    public static function get(string $config): array;
}
