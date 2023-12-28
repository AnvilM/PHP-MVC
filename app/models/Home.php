<?php

namespace App\Models;

use Src\Database\Eloquent\Model;

class Home extends Model
{
    //Set model database table
    public function __construct()
    {
        $this->setTable(get_class());
    }
}