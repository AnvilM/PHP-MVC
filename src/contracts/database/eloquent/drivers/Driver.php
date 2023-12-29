<?php

namespace Src\Contracts\Database\Eloquent\Drivers;

use Src\Database\Eloquent\Mysql\Delete\Delete;
use Src\Database\Eloquent\Mysql\Insert\Insert;
use Src\Database\Eloquent\Mysql\Select\Select;
use Src\Database\Eloquent\Mysql\Update\Update;

interface Driver
{

    //Set model tabel
    public function __construct(string $Table);





    /**
     * Select fields from database
     *
     * @param  array $Fields Fields for select
     * @return Select
     */
    public function select(array $Fields = ['*']): Select;





    /**
     * Insert data to database
     *
     * @return Insert
     */
    public function insert(): Insert;





    /**
     * Update field in database
     *
     * @return Update
     */
    public function update(): Update;





    /**
     * Delete field from database
     *
     * @return Delete
     */
    public function delete(): Delete;
}
