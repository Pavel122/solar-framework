<?php
namespace vendor\core;

/**
 * Class DB
 * Connect and config database
 * @package vendor\core
 * @author Vasya Pupkin <vasya@mail.ru>
 */

class DB
{
    public $db;

    public function __construct()
    {
        $db = parse_ini_file(CONFIG . '/db.ini', true)['database'];

        $this->db = \R::setup($db['dsh'], $db['user'], $db['password']);
        // \R::fancyDebug(true);
    }
}