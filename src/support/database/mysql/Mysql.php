<?php

namespace Src\Support\Database\Mysql;

use Src\Contracts\Support\Database\Drivers\Driver;

use Src\Support\Database\Mysql\Delete\Delete;
use Src\Support\Database\Mysql\Insert\Insert;
use Src\Support\Database\Mysql\Select\Select;
use Src\Support\Database\Mysql\Update\Update;

class Mysql implements Driver
{
    private string $Table = '';





    //Set model tabel
    public function __construct(string $Table)
    {
        $this->Table = $Table;
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
