<?php
namespace application\controllers;


class PageController extends App
{
    public function indexAction(){}

    public function viewAction()
    {
        $route = \vendor\core\Router::getRoute();
        $alias = $route['alias'];

        $model = new \application\models\Page();

        if (!$model->checkPage($alias))
            $this->view = "../404";
        else
            $this->view = $alias;
    }
}