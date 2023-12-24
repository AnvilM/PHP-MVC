<?php

namespace Console\Core;

use Console\Support\Config;

class Converter
{
    private array $Arguments = [];

    public array $Command = [];

    private array $CommandList = [];




    //Set arguments, commands and buil command
    public function __construct($Arguments)
    {
        $this->Arguments = $Arguments;

        $this->CommandList = Config::get('commands');

        $this->Build();
    }





    //Build command
    private function Build()
    {
        if ($this->Check())
        {
            $this->Name();

            $this->Arguments();

            $this->Class();
        }
    }





    //Chesk if command exists
    private function Check()
    {
        foreach ($this->CommandList as $CommandListEl)
        {
            if ($CommandListEl['Name'] == $this->Arguments[1])
            {
                return true;
            }
        }
        return false;
    }





    //Set command name
    private function Name()
    {
        $this->Command['Name'] = $this->Arguments[1];
    }





    //Set command arguments
    private function Arguments()
    {
        $this->Command['Arguments'] = [];

        for ($i = 2; $i < count($this->Arguments); $i++)
        {
            array_push($this->Command['Arguments'], $this->Arguments[$i]);
        }
    }





    //Set command class
    private function Class()
    {
        foreach ($this->CommandList as $CommandListEl)
        {
            if ($CommandListEl['Name'] == $this->Arguments[1])
            {
                $this->Command['Class'] = $CommandListEl['Class'];
            }
        }
    }
}
