<?php
namespace application\controllers;

/**
 * Class App
 * Need for common functions
 * @package application\controllers
 */

abstract class App extends \vendor\core\base\Controller
{
    abstract function indexAction();
}