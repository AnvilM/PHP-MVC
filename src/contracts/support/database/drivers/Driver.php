<?php

namespace Src\Contracts\Support\Database\Drivers;

use Src\Support\Database\Mysql\Delete\Delete;
use Src\Support\Database\Mysql\Insert\Insert;
use Src\Support\Database\Mysql\Select\Select;
use Src\Support\Database\Mysql\Update\Update;

interface Driver
{

    //Set model tabel
    public function __construct(string $Table);





    /**
     * Select Columns from table
     *
     * @param  array $Columns Columns for select
     * @return Select
     */
    public function select(array $Columns = ['*']): Select;





    /**
     * Insert data to table
     *
     * @return Insert
     */
    public function insert(): Insert;





    /**
     * Update field in table
     *
     * @return Update
     */
    public function update(): Update;





    /**
     * Delete field from table
     *
     * @return Delete
     */
    public function delete(): Delete;
}
