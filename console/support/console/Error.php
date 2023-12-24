<?php

namespace Console\Support\Console;

use ErrorException;

class Error
{
    public static function ThrowErrorWithErrorException(string $Message)
    {
        throw new ErrorException($Message);

        exit();
    }

    public static function ThrowErrorWithResponse(string $Message)
    {
        Response::Failure($Message);

        exit();
    }
}
