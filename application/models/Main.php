<?php
namespace application\models;

class Main extends \vendor\core\base\Model
{
    public function getAllPosts()
    {
        $this->setTable('posts');
        return $this->findAll();
    }
}