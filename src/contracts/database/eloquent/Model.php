<?php

namespace Src\Contracts\Database\Eloquent;

use Src\Database\Eloquent\Methods\Delete\Delete;
use Src\Database\Eloquent\Methods\Insert\Insert;
use Src\Database\Eloquent\Methods\Select\Select;
use Src\Database\Eloquent\Methods\Update\Update;

interface Model
{





    public function setTable(string $Table): void;





    public function select(array $Fields = ['*']): Select;





    public function insert(): Insert;





    public function update(): Update;





    public function delete(): Delete;
}
