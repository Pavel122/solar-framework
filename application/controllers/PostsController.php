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

        switch ($post) {
            case 404:
                $this->view = '../404';

                $this->setVariables([
                    'title' => 'Error 404 &ndash; Not found!'
                ]);

                break;
            case 403:
                $this->view = '../403';
                break;
            default:
                $this->view = 'page';

                $this->setVariables([
                    'title' => $post['title'],
                    'post' => $post,
                    'id' => $id
                ]);
        }
    }
}
