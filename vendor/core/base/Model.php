<?php
namespace vendor\core\base;

use vendor\core\DB, \PDOStatement, \Exception;

abstract class Model extends DB
{
    protected $table;
    protected $primKey = 'id';

    public function setTable($table)
    {
        $this->table = $table;
    }

    public function findAll(PDOStatement $stmt)
    {
        return $stmt->fetchAll();
    }

    public function findOne($id, array $columns = [])
    {
        try {
            $column = !empty($columns) ? implode(',', $columns) : '*';

            if (!isset($this->table))
                throw new Exception('Укажите таблицу в БД. Вызовите метод модели setTable()');

            $pk = $this->primKey;
            $table = $this->table;

            $sql = "SELECT $column FROM $table WHERE $pk = :id";
            $stmt = $this->execute($sql, [':id' => $id]);

            if (!$stmt)
                throw new Exception('Произошла ошибка! Такой таблицы нет!');

            return $stmt->fetch();
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function findLike($like, $field, $columns=[])
    {
        try {
            $columns = !empty($columns) ? implode(', ', $columns) : '*';
            $table = $this->table;

            if (!isset($table))
                throw new Exception('Укажите таблицу!');

            $sql = "SELECT $columns FROM `$table` WHERE `$field` LIKE :like";

            $data = $this->execute($sql, [':like' => "%$like%"])->fetch();

            if (!$data)
                throw new Exception('У вас ошибка в запросе!');

            return $data;
        } catch (Exception $e) {
            echo $e->getMessage();
            return false;
        }
    }
}