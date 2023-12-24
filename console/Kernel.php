<?php

namespace Console;

use Console\Nailer\Nailer;

class Kernel
{
    //Start nailer
    public function __construct($Arguments)
    {
        $Nailer = new Nailer($Arguments);
    }
}
