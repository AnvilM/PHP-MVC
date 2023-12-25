<?php

namespace Console\Contracts\Support\Console;

use Console\Support\Console\Response as SupportConsoleResponse;

interface Response
{

    public static function Success(string $Message): void;

    public static function SuccessWithExit(string $Message): void;


    public static function Failure(string $Message): void;

    public static function FailureWithExit(string $Message): void;


    public static function Message(string $Message, string $TextColor = '', string $BgColor = ''): void;

    public static function MessageWithExit(string $Message, string $TextColor = '', string $BgColor = ''): void;
}
