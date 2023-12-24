<?php

namespace Console;

use Console\Nailer\Nailer;

class Kernel
{

    public function __construct($Arguments)
    {
        $Nailer = new Nailer($Arguments);
    }
}
