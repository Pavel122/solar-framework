<?php
namespace application\controllers;

class PostsController extends App
{
    public function indexAction()
    {}

    public function allAction()
    {}

    public function pageAction()
    {
        $route = \vendor\core\Router::getRoute();
        $id = $route['id'];

        $model = new \application\models\Posts();
        $model->setTable('posts');
        $post = $model->post($id);

        if ($post == '404') {
            $this->view = '../404';

            $this->setVariables([
                'title' => 'Error 404 &ndash; Not found!'
            ]);
        } else {
            $this->view = 'page';
            $categories = $model->getCategs($id);

            $this->setVariables([
                'title' => $post['title'],
                'post' => $post,
                'categories' => $categories,
                'id' => $id
            ]);
        }
    }
}
