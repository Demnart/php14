<?php

/**
 * Created by PhpStorm.
 * User: genjo
 * Date: 19.06.17
 * Time: 16:42
 */
class DB
{
    private $dbh;

    public function __construct()
    {
        $this->dbh = new PDO('mysql:dbname=php13;host=localhost','root','death9393');
        $this->dbh->exec('SET CHARSET utf8');
    }

    public function querry($sql,$params=[])
    {
        $stn = $this->dbh->prepare($sql);
        $stn->execute($params);
        return $stn->fetchAll(PDO::FETCH_OBJ);
    }
}