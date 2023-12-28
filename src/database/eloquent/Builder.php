<?php

namespace Src\Database\Eloquent;

use mysqli_result;

use Src\Contracts\Database\Eloquent\Builder as BuilderInterface;
use Src\Database\Eloquent\Connect;

class Builder implements BuilderInterface
{
    protected string $Query = '';





    public function build(): mysqli_result | bool
    {
        $Connection = new Connect();
        return $Connection->Connection->query($this->Query);
    }
}
