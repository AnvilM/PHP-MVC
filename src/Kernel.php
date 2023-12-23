<?php

namespace Src;

use Src\Boot\Application;

class Kernel
{
    //Configs array
    private array $Config = [];





    //Load Configs, Helprs and Start Application
    public function __construct()
    {
        $this->LoadConfig();

        $this->LoadHelpers();

        $this->LoadApplication();
    }





    //Loads Configs
    private function LoadConfig()
    {
        $this->Config['Helpers'] = require_once ROOT . 'config/helpers.php';
    }





    //Loads Helpers
    private function LoadHelpers()
    {
        foreach ($this->Config['Helpers'] as $Helper)
        {
            require_once ROOT . 'src/helpers/' . $Helper . '.php';
        }
    }





    //Start Application
    private function LoadApplication()
    {
        $Application = new Application;
        $Application->make();
    }
}
