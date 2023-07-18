<?php

namespace src\lib;

use mysqli;

class Db{

    protected $db;

    public function __construct(){
        $DB_HOST = Env::get('DB_HOST');
        $DB_USER = Env::get('DB_USER');
        $DB_PASSWORD = Env::get('DB_PASSWORD');
        $DB_NAME = Env::get('DB_NAME');
        $this->db = new mysqli($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);
    }

    public function query($req){
        $req = $this->db->query($req);
        return $req;
    }
    
}
