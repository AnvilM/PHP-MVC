<?php

namespace Console\Support\Console;

class Response
{

    public static function Success(string $Message)
    {
        $Console = new Console;

        $Console->Text("SUCCESS")->BgColor('Green')->Next()->Text($Message)->BgColor('White')->WriteSpace();
    }

    public static function Failure($Message)
    {
        $Console = new Console;

        $Console->Text("FAILURE")->BgColor('Red')->Next()->Text($Message)->BgColor('White')->WriteSpace();
    }
}
