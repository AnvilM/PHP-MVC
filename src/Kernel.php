<?php

namespace Src;

use Src\Boot\Application;
use Src\Support\Config;

class Kernel
{





    //Load Helprs and Start Application
    public function __construct()
    {
        $this->LoadHelpers();

        $this->LoadApplication();
    }





    //Loads Helpers
    private function LoadHelpers()
    {
        foreach (Config::get('helpers') as $Helper)
        {
            require_once ROOT . '/src/helpers/' . $Helper . '.php';
        }
    }





    //Start Application
    private function LoadApplication()
    {
        $Application = new Application;
        $Application->make();
    }
}
