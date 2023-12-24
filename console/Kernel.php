<?php

namespace Console;

use Console\Config\Config;
use Console\Nailer\Nailer;

class Kernel
{
    //Start nailer
    public function __construct($Arguments)
    {
        $this->LoadHelpers();

        $Nailer = new Nailer($Arguments);
    }

    //Loads Helpers
    private function LoadHelpers()
    {
        foreach (Config::get('helpers') as $Helper)
        {
            require_once ROOT . '/console/helpers/' . $Helper . '.php';
        }
    }
}
