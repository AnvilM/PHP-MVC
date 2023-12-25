<?php

namespace Console\Contracts\Support\Console;

use Console\Support\Console\Console as SupportConsoleConsole;

interface Console
{
    public function TextColor(string $Color): SupportConsoleConsole;

    public function BgColor(string $Color): SupportConsoleConsole;

    public function Text(string $Text): SupportConsoleConsole;


    public function Next(): SupportConsoleConsole;


    public function Write(): void;

    public function WriteSpace(): void;

    public function WriteLn(): void;
}
