<?php

namespace Console\Commands\Make;

use Console\Support\Console\Response;


class Model
{
    private array $Command = [];

    private string $Model = '';

    private string $ModelPath = '';

    public function __construct(array $Command)
    {
        $this->Command = $Command;

        $this->Model = $Command['Arguments'][0];

        $this->ModelPath = ROOT . '/app/models/' . $this->Model . '.php';

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
            Response::FailureWithExit(" Model [$this->ModelPath] already exists");
        }
    }


    private function Check()
    {
        if (!file_exists($this->ModelPath))
        {
            return true;
        }
        return false;
    }

    private function Create()
    {
        file_put_contents($this->ModelPath, GetModelData($this->Model));
    }

    private function Response()
    {

        Response::SuccessWithExit(" Model [$this->ModelPath] created successfully");
    }
}
