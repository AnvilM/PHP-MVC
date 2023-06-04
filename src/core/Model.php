<?php

namespace src\core;

use src\lib\Db;

abstract class Model{
    
    public $db;
    
    public function __construct(){
        $this->db = new Db;
        
    }

    public function RolesSync($Login){
        return $this->db->query("SELECT * FROM `players_roles` WHERE `Login` = '$Login'");
    }

    public function getNotices($Login){
        return $this->db->query("SELECT `Message` FROM `players_notices` WHERE `Login` = '$Login' ORDER BY `Date` DESC");
    }

    
}
