<?php
namespace application\models;

use vendor\core\base\Model, \Exception;

class Posts extends Model
{
    private function getPage($id)
    {
        $res = $this->findOne($id, ['author', 'title', 'content', 'category_id', 'datetime']);
        return $res;
    }

    public function post($id)
    {
        try {
            $page = $this->getPage($id);
            if (!$page)
                throw new Exception(404);

            return $page;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}