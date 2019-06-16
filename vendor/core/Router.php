<?php
namespace vendor\core;

use \Exception;

/**
 * Router of Test framework
 *
 * @author Vasya Pupkin <vasya@mail.ru>
 * @version 1.0
 * @package vendor\core
 */

class Router
{
    /**
     * @var array $routes contains all routes
     * @var array $route contains this route
     */

    protected static $routes, $route = [];

    /**
     * Add new route
     * @param string $regExp contains a regular expression
     * @param array $route contains current route
     */

    public static function add($regExp, array $route = [])
    {
        self::$routes[$regExp] = $route;
    }

    public static function getRoutes()
    {
        return self::$routes;
    }

    public static function getRoute()
    {
        return self::$route;
    }

    /**
     * Assign this route to property $route
     * @param string $url current page url
     * @return boolean true
     */

    private static function matchRoute($url)
    {
        foreach (self::getRoutes() as $pattern => $route) {
            if (preg_match("#$pattern#i", $url, $matches)) {
                foreach ($matches as $key => $value) {
                    if (is_string($key))
                        $route[$key] = $value;
                }

                $route['controller'] = self::toCamelCase($route['controller']);

                if (!isset($route['action']))
                    $route['action'] = 'index';

                self::$route = $route;
                return true;
            }
        }

        return false;
    }

    /**
     * Redirects url to the correct route
     * @param string $url incoming url
     * @return void
     */

    public static function dispatch($url)
    {
        $url = self::removeQueryStr($url);

        try {
            if (!self::matchRoute($url))
                throw new Exception(404);

            $controller = 'application\controllers\\' . self::$route['controller'] . "Controller";

            if (!class_exists($controller))
                throw new Exception(404);

            $controller = new $controller(self::$route);
            $action = self::toStudlyCase(self::$route['action']) . 'Action';

            if (!method_exists($controller, $action))
                throw new Exception(404);

            $controller->$action();
            $controller->getView();
        } catch (Exception $e) {
            switch ($e->getMessage()) {
                case 403:
                    http_response_code(403);
                    include APP . '/views/403.php';
                    break;
                case 404:
                    http_response_code(404);
                    include APP . '/views/404.php';
                    break;
            }
        }
    }

    private static function toCamelCase($str)
    {
        $str = str_replace('-', ' ', $str);
        $str = ucwords($str);
        return str_replace(' ', '', $str);
    }

    private static function toStudlyCase($str)
    {
        return lcfirst(self::toCamelCase($str));
    }

    private static function removeQueryStr($url)
    {
        if ($url) {
            $pageUrl = $url;

            if (strpos($url, '?'))
                $pageUrl = substr($url, 0, strpos($url, '?'));

            return $pageUrl;
        }
    }
}
