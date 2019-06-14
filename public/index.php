<?php
error_reporting(E_ALL);

use vendor\core as core;

define('WWW', __DIR__);
define('ROOT', dirname(WWW));
define('CORE', ROOT . '/vendor/core');
define('APP', ROOT . '/application');
define('LAYOUT', 'default');

$query = rtrim($_SERVER['REQUEST_URI'], '/');

/* Автозагрузчик классов */
spl_autoload_register(function ($class) {
    $file = ROOT . '/' . str_replace('\\','/', $class) . '.php';

    if (is_file($file))
        require_once $file;
});

foreach (glob('../vendor/libs/*.php') as $file) // Include all files from libs
    require_once $file;

core\Router::add('^/page/(?P<action>[a-z-]+)/(?P<alias>[a-z-]+)$', ['controller' => 'page']);
core\Router::add('^/users/profile/(?P<name>[a-z0-9-]+)$', ['controller' => 'users', 'action' => 'index']);
core\Router::add('^/page/(?P<alias>[a-z-]+)$', ['controller' => 'page', 'action' => 'view']);
core\Router::add('^/posts/(?P<id>[0-9]+)$', ['controller' => 'posts', 'action' => 'page']);

// Default rules
core\Router::add('^$', ['controller' => 'Main', 'action' => 'index']);
core\Router::add('^/(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');

core\Router::dispatch($query);
// jK239PqP92   