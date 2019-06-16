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
     * @var string $title contains page title
     * @var array $site contains data of site from ini-file
     * @var array $route contains current route
     * @var string $view current view
     * @var string $layout current template
     */

    public $site = [], $title = '';
    protected $route = [];
    protected $view, $layout = '';

    public function __construct($route, $layout='', $view='')
    {
        $this->route = $route;

        if ($layout !== false)
            $this->layout =  $layout ?: LAYOUT;

        $this->view = $view;
        $this->site = parse_ini_file(CONFIG . '/main.ini', true)['site'];
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
                echo $e->getMessage();
            }
        }
    }
}