<?php
namespace vendor\core;
use \PDO, \PDOStatement;

/**
 * Class DB
 * Connect and config database
 * @package vendor\core
 * @author Vasya Pupkin <vasya@mail.ru>
 */

class DB
{
    public $pdo;

    public function __construct()
    {
        $db = parse_ini_file(ROOT . '/config/db.ini', true)['database'];
        $dsh = $db['db_type'] . ":host={$db['host']};dbname={$db['db_name']};charset={$db['charset']}";

        $options = [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ];

        $this->pdo = new PDO($dsh, $db['user'], $db['password'], $options);
    }

    /**
     * @param $sql SQL-query to database
     * @param array $data contains data to execution prepare stmt
     * @return bool|PDOStatement
     */
    public function execute($sql, array $data=[])
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute($data);
        return $stmt;
    }
}