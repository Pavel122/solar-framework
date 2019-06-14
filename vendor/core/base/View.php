<?php
namespace vendor\core\base;
use \Exception;

/**
 * Class View
 * @package vendor\core\base
 */

class View
{
    /**
     * @var array $routes contains all routes
     * @var string $view current view
     * @var string $layout current template
     */

    protected $route = [];
    protected $view, $layout;

    public function __construct($route, $layout='', $view='')
    {
        $this->route = $route;

        if ($layout !== false)
            $this->layout =  $layout ?: LAYOUT;
        else
            $this->layout = false;

        $this->view = $view;
    }

    public  function render($variables)
    {
        extract($variables);

        if ($this->layout !== false) {
            try {
                $file_view = APP . '/views/' . $this->route['controller'] . '/' . $this->view . '.php';

                ob_start();

                if (!is_file($file_view))
                    throw new Exception("<p>Не найден вид <b>$file_view</b></p>");
                require_once $file_view;

                $ctx = ob_get_clean();

                $file_layout = APP . '/views/layouts/' . $this->layout . '.template.php';

                if (!is_file($file_layout))
                    throw new Exception("<p>Не найден шаблон <b>$file_layout</b></p>");
                require_once $file_layout;
            } catch (Exception $e) {
                $e->getMessage();
            }
        }
    }
}