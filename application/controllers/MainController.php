<?php
namespace application\controllers;

use application\models\Main;
use vendor\core\App as Registry;

class MainController extends App
{
    public function indexAction()
    {
        $model = new Main();
        $posts = Registry::$app->cache->get('posts');

        if (!$posts) {
            $posts = $model->getAllPosts();
            Registry::$app->cache->set('posts', $posts);
        }

        $this->setVariables([
            'title' => 'Последние посты',
            'posts' => $posts
        ]);
    }
}
