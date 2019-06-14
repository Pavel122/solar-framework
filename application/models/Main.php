<?php
namespace application\models;

class Main extends \vendor\core\base\Model
{
    public function getAllPosts()
    {
        $sql = "SELECT `id`, `author`, `title`, `content` FROM `posts` ORDER BY `datetime` LIMIT 5";
        $stmt = $this->execute($sql);

        return $this->findAll($stmt);
    }
}