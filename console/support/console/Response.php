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
        $Console = new Console;

        $Console->Text("SUCCESS")->BgColor('Green')->Next()->Text($Message)->BgColor('White')->WriteSpace();

        exit();
    }


    public static function Failure(string $Message)
    {
        $Console = new Console;

        $Console->Text("FAILURE")->BgColor('Red')->Next()->Text($Message)->BgColor('White')->WriteSpace();
    }

    public static function FailureWithExit(string $Message)
    {
        $Console = new Console;

        $Console->Text("FAILURE")->BgColor('Red')->Next()->Text($Message)->BgColor('White')->WriteSpace();

        exit();
    }
}
