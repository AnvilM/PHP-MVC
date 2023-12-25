<?php

namespace Console\Commands\Make;

use Console\Support\Console\Response;


class Middleware
{
    private array $Command = [];

    private string $Middleware = '';

    private string $MiddlewarePath = '';

    public function __construct(array $Command)
    {
        $this->Command = $Command;

        $this->Middleware = $Command['Arguments'][0];

        $this->MiddlewarePath = ROOT . '/app/middlewares/' . $this->Middleware . '.php';

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
            Response::FailureWithExit(" Middleware [$this->MiddlewarePath] already exists");
        }
    }


    private function Check()
    {
        if (!file_exists($this->MiddlewarePath))
        {
            return true;
        }
        return false;
    }

    private function Create()
    {
        file_put_contents($this->MiddlewarePath, GetMiddlewareData($this->Middleware));
    }

    private function Response()
    {

        Response::SuccessWithExit(" Middleware [$this->MiddlewarePath] created successfully");
    }
}
