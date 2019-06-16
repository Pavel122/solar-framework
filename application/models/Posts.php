<?php
namespace application\models;

use vendor\core\base\Model, \Exception;

class Posts extends Model
{
    private function getPage($id)
    {
        $res = $this->findOne("id = ?", [$id]);
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

    public function getCategs($id)
    {
        $post = $this->post($id);
        $categories = [];

        if (is_numeric($post))
            return false;

        $categ_id = $post->category_id;


        $this->setTable('categories');
        $cat = $this->findOne('id = :id', [':id' => $categ_id]);

        if (!$cat)
            exit('<b>Fatal error:</b> this post has an <b>unknown</b> category.');

        $categories[] = [
            'title' => $cat->title,
            'alias' => $cat->alias
        ];

        while ($cat->parent) {
            $cat = $this->findOne('id = :parent', [':parent' => $cat->parent]);
            $categories[] = [
                'title' => $cat->title,
                'alias' => $cat->alias
            ];
        }

        return array_reverse($categories);
    }
}