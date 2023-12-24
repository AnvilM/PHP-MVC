<?php

namespace Console\Commands;

class Printr
{
    public function __construct(array $Command)
    {
        print_r($Command['Arguments'][0]);
    }
}
