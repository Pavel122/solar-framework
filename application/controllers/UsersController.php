<?php
namespace application\controllers;

use vendor\core\Router;

/**
 * Class UsersController
 * @package application\controllers
 */
class UsersController extends App
{
    function indexAction()
    {
        $name = Router::getRoute()['name'];

        $this->setVariables([
            'title' => 'Участник: ' . $name
        ]);
    }
}