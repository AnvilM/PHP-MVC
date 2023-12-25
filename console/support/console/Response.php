<?php

namespace Console\Support\Console;

use Console\Contracts\Support\Console\Response as ContractsConsoleResponse;

class Response implements ContractsConsoleResponse
{

    public static function Success(string $Message): void
    {
        $Console = new Console;

        $Console->Text("SUCCESS")->BgColor('Green')->Next()->Text($Message)->BgColor('White')->WriteSpace();
    }

    public static function SuccessWithExit(string $Message): void
    {
        Response::Success($Message);

        exit();
    }


    public static function Failure(string $Message): void
    {
        $Console = new Console;

        $Console->Text("FAILURE")->BgColor('Red')->Next()->Text($Message)->BgColor('White')->WriteSpace();
    }

    public static function FailureWithExit(string $Message): void
    {
        Response::Failure($Message);

        exit();
    }

    public static function Message(string $Message, string $TextColor = '', string $BgColor = ''): void
    {
        $Console = new Console;

        $Console->Text($Message)->TextColor($TextColor)->BgColor($BgColor)->WriteLn();
    }


    public static function MessageWithExit(string $Message, string $TextColor = '', string $BgColor = ''): void
    {
        Response::Message($Message, $TextColor, $BgColor);

        exit();
    }
}
