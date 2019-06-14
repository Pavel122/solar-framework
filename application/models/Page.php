<?php
namespace application\models;

use \DirectoryIterator;

class Page extends \vendor\core\base\Model
{
    function checkPage($alias)
    {
        $path = APP . '/views/page/' . $alias . '.php';

        if (is_file($path))
            return true;
        return false;
    }
}