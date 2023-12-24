<?php

namespace Console\Commands\Make;

use Console\Support\Console\Color;

class Controller
{
    private array $Command = [];

    private string $Controller = '';

    private string $ControllerPath = '';

    public function __construct(array $Command)
    {
        $this->Command = $Command;

        $this->Controller = $Command['Arguments'][0];

        $this->ControllerPath = ROOT . '/app/controllers/' . $this->Controller . '.php';

        $this->Handle();

        $this->Response();
    }


    private function Handle()
    {
        if ($this->Check())
        {
            $this->Create();
        }
        else
        {
            //throw new exeption Controller already exists
        }
    }


    private function Check()
    {
        if (!file_exists($this->ControllerPath))
        {
            return true;
        }
        return false;
    }

    private function Create()
    {
        file_put_contents($this->ControllerPath, GetControllerData($this->Controller));
    }

    private function Response()
    {
        $Color = new Color();

        $Color->Text("SUCCESS")->BgColor('Green')->Next()->Text(" Controller [$this->ControllerPath] created successfully")->WriteSpace();
    }
}
