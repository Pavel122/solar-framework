<?php
namespace vendor\core;

class Registry
{
    private static $objects = [];
    private static $_instance;


    public function __get($name)
    {
        if (is_object(self::$objects[$name]))
            return self::$objects[$name];
        else
            exit('<b>Fatal error:</b> try to use <b>undefined</b> class property <b>' . $name . '</b>. Class name: <b>' . __CLASS__ . '</b>');
    }


    public function __set($name, $value)
    {
        if (!is_object(self::$objects[$name]))
            self::$objects[$name] = new $value;
    }


    private function __construct()
    {
        $config = parse_ini_file(CONFIG . '/registry.ini', true);

        foreach ($config['components'] as $name => $component)
            self::$objects[$name] = new $component;
    }

    private function __clone(){}

    public static function getInstance()
    {
        if (!(self::$_instance instanceof self))
            self::$_instance = new self();

        return self::$_instance;
    }

    public static function getObjects()
    {
        var_dump(self::$objects);
    }
}
