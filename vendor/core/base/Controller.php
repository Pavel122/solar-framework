<?php
namespace vendor\core\base;

abstract class Controller
{
    protected $route, $variables = [];
    protected $layout, $view;

    public function __construct($route)
    {
        $this->route = $route;
        $this->view = $route['action'];
    }

    public function getView()
    {
        $viewObj = new View($this->route, $this->layout, $this->view);
        $viewObj->render($this->variables);
    }

    protected function setVariables(array $variables)
    {
        $this->variables = $variables;
    }
}