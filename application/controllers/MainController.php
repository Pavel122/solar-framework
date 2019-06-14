<?php
namespace application\controllers;

use application\models\Main;

class MainController extends App
{
    public function indexAction()
    {
        $model = new Main();
        $posts = $model->getAllPosts();
        $model->setTable('posts');

        $this->setVariables([
            'title' => 'Последние посты',
            'posts' => $posts
        ]);
    }
}
