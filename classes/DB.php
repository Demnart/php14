<?php


class DB
{
    private $dbh;

    public function __construct()
    {
       $this->dbh = new PDO('mysql:dbname=php13;host=localhost','root','death9393');
       $this->dbh->exec('SET CHARSET utf8');

    }
}