<?php

namespace Console\Nailer;

use Console\Core\Handler;
use Console\Core\Converter;

class Nailer
{

    private array $Command = [];




    //Covert Aguments to Command and Execute
    public function __construct($Arguments)
    {
        $this->Converter($Arguments);

        $this->Execute();
    }




    //Covert Aguments to Command
    private function Converter($Arguments)
    {
        $Converter = new Converter($Arguments);

        $this->Command = $Converter->Command;
    }



    //Execute Command
    private function Execute()
    {
        if (class_exists($this->Command['Class']))
        {
            $Command = new $this->Command['Class']($this->Command);
        }
    }
}
