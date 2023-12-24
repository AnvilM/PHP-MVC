<?php

namespace Console\Core;

use Console\Config\Config;

class Handler
{

    private array $Command = [];


    private array $Commands = [];


    public function __construct($Command)
    {
        $this->Command = $Command;

        $this->Commands = Config::get('commands');

        $this->Find();
    }











    private function Find()
    {
        foreach ($this->Commands as $Command)
        {
            if ($Command['Name'] == $this->Command['Name'])
            {
                $this->Command['Class'] = $Command['Class'];
                return true;
            }
        }
        return false;
    }
}
