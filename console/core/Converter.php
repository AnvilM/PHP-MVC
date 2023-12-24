<?php

namespace Console\Core;

use Console\Config\Config;

class Converter
{
    private array $Arguments = [];

    public array $Command = [];

    private array $CommandList = [];





    public function __construct($Arguments)
    {
        $this->Arguments = $Arguments;

        $this->CommandList = Config::get('commands');

        $this->Build();
    }





    private function Build()
    {
        if ($this->Check())
        {
            $this->Name();

            $this->Arguments();

            $this->Class();
        }
    }





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





    private function Name()
    {
        $this->Command['Name'] = $this->Arguments[1];
    }





    private function Arguments()
    {
        $this->Command['Arguments'] = [];

        for ($i = 2; $i < count($this->Arguments); $i++)
        {
            array_push($this->Command['Arguments'], $this->Arguments[$i]);
        }
    }





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
