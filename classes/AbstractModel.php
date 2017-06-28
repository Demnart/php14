<?php

/**
 * Created by PhpStorm.
 * User: genjo
 * Date: 19.06.17
 * Time: 16:41
 */
abstract class AbstractModel
{

    protected static $table;
    protected $data=[];

    public function __set($name, $value)
    {
     $this->data[$name] = $value;
    }

    public function __get($name)
    {
        return $this->data[$name];
    }

    public static function getOneByColumn($column,$value)
    {
        $sql = 'SELECT * FROM ' . static::$table . ' WHERE ' . $column .  '=:value';
        $db = new DB();
        $db->setClassName(get_called_class());
        return $db->querry($sql,[':value' =>$value]);
    }

    public static function getAll()
    {
        $db = new DB();
        $class = get_called_class();
        $db->setClassName($class);
        $sql = "SELECT * FROM " . static::$table;
        return $db->querry($sql);
    }

    public static function getOne($id)
    {
        $db = new DB();

        $sql = "SELECT * FROM " . static::$table . " WHERE id=:id";
        return $db->querry($sql,[':id'=>$id])[0];
    }

    public function insert()
    {
        $cols = array_keys($this->data);
        foreach ($cols as $col){
        $data[':' . $col]= $this->data[$col];
    }
        $sql = 'INSERT INTO '. static::$table .
            '('.implode(', ' , $cols).')
             VALUES
             ('.implode(',' , array_keys($data)).')
      ';
        $db = new DB();
        $db->execute($sql,$data);
    }

    public function delete()
    {
        $sql = 'DELETE FROM ' . static::$table . ' WHERE id = :id';
        $db = new DB();
        $db->setClassName(get_called_class());
        $db->execute($sql, [':id'=>$this->data['id']]);
    }

}