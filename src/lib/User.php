<?php

namespace src\lib;

use mysqli;
use src\lib\Db;

class User{

    public function isLogined(){
        if(isset($_SESSION['Login'])){
            return true;
        }
        return false;
    }

}
