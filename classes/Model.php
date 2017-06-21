<?php

/**
 * Created by PhpStorm.
 * User: genjo
 * Date: 19.06.17
 * Time: 16:41
 */
abstract class Model
{

    protected static $table;

    public static function getAll()
    {
        $db = new DB();
        $sql = "SELECT * FROM " . static::$table;
        return $db->querry($sql);
    }

    public static function getOne($id)
    {
        $db = new DB();
        $sql = "SELECT * FROM " . static::$table . " WHERE id=:id";
        return $db->querry($sql,[':id'=>$id])[0];
    }
}