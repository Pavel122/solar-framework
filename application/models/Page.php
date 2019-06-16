<?php
namespace application\models;

use \DirectoryIterator;

class Page extends \vendor\core\base\Model
{
    private $title, $path;

    public function checkPage($alias)
    {
        $this->path = APP . '/views/page/' . $alias . '.php';

        if (is_file($this->path))
            return true;

        return false;
    }
}