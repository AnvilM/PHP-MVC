<?php

namespace Console\Commands;

use Console\Support\Console\Response;


class Serve
{
    private array $Command = [];

    private string $Port = '';

    private string $ControllerPath = '';

    public function __construct(array $Command)
    {
        $this->Command = $Command;

        $this->Port = GetArgument($this->Command, 0, '8000');

        $this->Handle();
    }

    private function Handle()
    {

        $connection = @fsockopen('localhost', $this->Port);

        if (!is_resource($connection))
        {
            $this->Response();

            $this->Serve();
        }
        else
        {
            Response::FailureWithExit(" Port $this->Port already in use");
        }
    }

    private function Response()
    {
        Response::Success(" Development server started on [http://localhost:$this->Port]");

        Response::Message("Press Ctrl+C to stop the server", 'Yellow');
    }

    private function Serve()
    {
        exec("php -S localhost:$this->Port -t " . ROOT . '/public');
    }
}
