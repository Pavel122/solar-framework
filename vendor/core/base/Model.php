<?php
namespace vendor\core\base;

use vendor\core\DB, \Exception;

abstract class Model extends DB
{
    protected $table;

    public function setTable($table)
    {
        $this->table = $table;
    }

    public function findAll($params='')
    {
        try {
            if (!$this->table)
                throw new Exception('Укажите таблицу, из которой хотите всё выбрать!');

            return \R::findAll($this->table, $params);
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function findOne($params, $prep=[])
    {
        try {
            if (!$this->table)
                throw new Exception('Укажите таблицу в БД. Вызовите метод модели setTable()');

            return \R::findOne($this->table, $params, $prep);
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function findLike($like, $field)
    {
        try {
            $table = $this->table;

            if (!isset($table))
                throw new Exception('Укажите таблицу!');

            $data = \R::find($table, "$field LIKE :like", [':like' => $like]);
            return $data;
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }
}