<?php

namespace Src\Contracts;

interface Request
{
    public static function uri(): string;

    public static function method(): string;

    public static function get(): array;

    public static function post(): array;

    public static function route(string $param, string $default): string;
}
