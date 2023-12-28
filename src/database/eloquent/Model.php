<?php

namespace Src\Database\Eloquent;

use Src\Contracts\Database\Eloquent\Model as ModelInterface;

use Src\Database\Eloquent\Methods\Delete\Delete;
use Src\Database\Eloquent\Methods\Insert\Insert;
use Src\Database\Eloquent\Methods\Select\Select;
use Src\Database\Eloquent\Methods\Update\Update;

class Model implements ModelInterface
{
    private string $Table = '';





    //Set model tabel
    public function setTable(string $Table): void
    {
        $this->Table = strtolower(explode('\\', $Table)[count(explode('\\', $Table)) - 1]);
    }





    /**
     * Select fields from database
     *
     * @param  array $Fields Fields for select
     * @return Select
     */
    public function select(array $Fields = ['*']): Select
    {
        $Select = new Select($this->Table, $Fields);
        return $Select;
    }





    /**
     * Insert data to database
     *
     * @return Insert
     */
    public function insert(): Insert
    {
        $Insert = new Insert($this->Table);
        return $Insert;
    }





    /**
     * Update field in database
     *
     * @return Update
     */
    public function update(): Update
    {
        $Update = new Update($this->Table);
        return $Update;
    }





    /**
     * Delete field from database
     *
     * @return Delete
     */
    public function delete(): Delete
    {
        $Delete = new Delete($this->Table);
        return $Delete;
    }
}
