<?php

namespace Console\Nailer;

use Console\Core\Handler;
use Console\Core\Converter;

class Nailer
{

    private array $Command = [];

    public function __construct($Arguments)
    {
        $this->Converter($Arguments);

        $this->Execute();
    }

    private function Converter($Arguments)
    {
        $Converter = new Converter($Arguments);

        $this->Command = $Converter->Command;
    }




    private function Execute()
    {
        if (class_exists($this->Command['Class']))
        {
            $Command = new $this->Command['Class']($this->Command);
        }
    }
}
