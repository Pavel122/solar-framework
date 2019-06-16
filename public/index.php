<?php
error_reporting(E_ALL);

use vendor\core\Router, vendor\core\App;

define('WWW', __DIR__);
define('ROOT', dirname(WWW));
define('CORE', ROOT . '/vendor/core');
define('LIBS', ROOT . '/vendor/libs');
define('APP', ROOT . '/application');
define('LAYOUT', 'default');
define('CONFIG', ROOT . '/config');
define('TMP', ROOT . '/tmp');
define('CACHE', TMP . '/cache');

$query = rtrim($_SERVER['REQUEST_URI'], '/');

foreach (glob(LIBS . '/*.php') as $file) // Include all files from libs
    require_once $file;

/* Автозагрузчик классов */
spl_autoload_register(function ($class) {
    $file = ROOT . '/' . str_replace('\\','/', $class) . '.php';

    if (is_file($file))
        require_once $file;
});

new App();

Router::add('^/page/(?P<action>[a-z-]+)/(?P<alias>[a-z-]+)$', ['controller' => 'page']);
Router::add('^/users/profile/(?P<name>[a-z0-9-]+)$', ['controller' => 'users', 'action' => 'index']);
Router::add('^/page/(?P<alias>[a-z-]+)$', ['controller' => 'page', 'action' => 'view']);
Router::add('^/posts/(?P<id>[0-9]+)$', ['controller' => 'posts', 'action' => 'page']);
// Router::add('^/category/(?P<alias>[a-z-]+)$', ['controller' => 'category', 'action' => 'get']);

// Default rules
Router::add('^$', ['controller' => 'Main', 'action' => 'index']);
Router::add('^/(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');

Router::dispatch($query);
