<?php

namespace Console\Support\Console;

class Response
{

    public static function Success(string $Message)
    {
        $Console = new Console;

        $Console->Text("SUCCESS")->BgColor('Green')->Next()->Text($Message)->BgColor('White')->WriteSpace();
    }

    public static function SuccessWithExit(string $Message)
    {
        Response::Success($Message);

        exit();
    }


    public static function Failure(string $Message)
    {
        $Console = new Console;

        $Console->Text("FAILURE")->BgColor('Red')->Next()->Text($Message)->BgColor('White')->WriteSpace();
    }

    public static function FailureWithExit(string $Message)
    {
        Response::Failure($Message);

        exit();
    }

    public static function Message(string $Message, string $TextColor = '', string $BgColor = '')
    {
        $Console = new Console;

        $Console->Text($Message)->TextColor($TextColor)->BgColor($BgColor)->WriteLn();
    }


    public static function MessageWithExit(string $Message, string $TextColor = '', string $BgColor = '')
    {
        Response::Message($Message, $TextColor, $BgColor);

        exit();
    }
}
