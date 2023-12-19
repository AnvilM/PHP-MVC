<?php

namespace Src\Core;

use mysqli;
use Src\Helpers\EnvHelper;

class Model
{
    protected $DB;

    public function __construct()
    {
        $DB_HOST = EnvHelper::get('DB_HOST');
        $DB_PORT = EnvHelper::get('DB_PORT');
        $DB_DATABASE = EnvHelper::get('DB_DATABASE');
        $DB_USERNAME = EnvHelper::get('DB_USERNAME');
        $DB_PASSWORD = EnvHelper::get('DB_PASSWORD');

        $this->DB = new mysqli($DB_HOST, $DB_USERNAME, $DB_PASSWORD, $DB_DATABASE, $DB_PORT);
    }

    public function query($req)
    {
        return $this->DB->query($req);
    }
}
