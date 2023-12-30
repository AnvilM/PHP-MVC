<?php

namespace Src\Database;

use Src\Contracts\Support\Database\Drivers\Delete\Delete;
use Src\Contracts\Support\Database\Drivers\Insert\Insert;
use Src\Contracts\Support\Database\Drivers\Select\Select;
use Src\Contracts\Support\Database\Drivers\Update\Update;

use Src\Support\Database\DB;

class Model
{
    private string $Table = '';

    private DB $DB;

    private array $InsertColmns;

    private Select | Insert | Update | Delete $Query;




    public function __construct()
    {
        $ModelClass = get_called_class();


        $Table = property_exists($ModelClass, 'tablename')
            ? $ModelClass::$tablename
            : explode('\\', get_called_class())[count(explode('\\', get_called_class())) - 1];


        $this->Table = strtolower($Table);

        $this->DB = new DB;
    }





    public function select(string ...$Columns)
    {
        $ArrayColumns = [];
        foreach ($Columns as $Column)
        {
            $ArrayColumns[] = $Column;
        }

        if (count($ArrayColumns) == 0)
        {
            $ArrayColumns = ['*'];
        }

        $this->Query = $this->DB::table($this->Table)
            ->select($ArrayColumns);

        return $this;
    }





    public function where(string $Column, mixed $Value)
    {
        $this->Query = $this->Query->where($Column, '=', $Value);

        return $this;
    }





    public function update(array $Updates)
    {
        $this->Query = $this->DB::table($this->Table)->update();

        for ($i = 0; $i < count($Updates); $i += 2)
        {
            $this->Query->set($Updates[$i], $Updates[$i + 1]);
        }

        return $this;
    }





    public function delete()
    {
        $this->Query = $this->DB::table($this->Table)->delete();

        return $this;
    }





    public function start()
    {
        return $this->Query->run();
    }





    public function __set($name, $value)
    {
        $this->InsertColmns[] = [$name, $value];
    }





    public function save()
    {
        $this->Query = $this->DB::table($this->Table)->insert();
        foreach ($this->InsertColmns as $InsertColumn)
        {
            $this->Query->set($InsertColumn[0], $InsertColumn[1]);
        }

        $this->Query->run();
    }
}
