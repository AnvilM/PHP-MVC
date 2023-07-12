<?php

namespace src\lib;

use mysqli;

class Db{

    protected $db;

    public function __construct(){
        $settings = require $GLOBALS['ROOT'].'/src/config/db.php';
        $this->db = new mysqli($settings['hostname'], $settings['username'], $settings['password'], $settings['database']);
    }

    public function query($req){
        $req = $this->db->query($req);
        return $req;
    }
    
}
