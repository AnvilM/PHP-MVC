<?php

namespace Src\Support\Database;

use PDO;
use PDOStatement;
use Src\Support\Database\Connection;

class Builder
{
    private Connection $Connecion;

    private string $Query = '';

    private PDOStatement $PDOStatement;

    private array $Binds = [];


    private function prepare()
    {
        $this->Connecion = new Connection();

        $this->PDOStatement = $this->Connecion->open()->prepare($this->Query);
    }





    public function addToQuery(string $Query)
    {
        $this->Query = $this->Query . ' ' . $Query;

        return $this;
    }





    public function getQuery()
    {
        return $this->Query;
    }





    public function addBind(string $Bind, int $Type = PDO::PARAM_STR)
    {
        $LastBind = count($this->Binds);
        $this->Binds[$LastBind]['Bind'] = $Bind;
        $this->Binds[$LastBind]['Type'] = $Type;

        return $this;
    }





    public function build()
    {
        $this->prepare();

        for ($i = 0; $i < count($this->Binds); $i++)
        {
            $this->PDOStatement->bindParam($i + 1, $this->Binds[$i]['Bind'], $this->Binds[$i]['Type']);
        }


        return $this;
    }





    public function execute()
    {
        $this->PDOStatement->execute();

        $this->Connecion->close();

        return $this->PDOStatement;
    }





    public static function exec(string $Query)
    {
        $Connection = new Connection;
        $res = $Connection->open()->query($Query);
        $Connection->close();

        return $res;
    }
}
