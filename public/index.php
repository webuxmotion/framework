<?php
error_reporting(-1);

use core\Router;
use core\T;

$query = trim($_SERVER['REQUEST_URI'], '/');

define('WWW', __DIR__);
define('ROOT', dirname(__DIR__));
define('CORE', ROOT . '/core');
define('LIBS', ROOT . '/core/libs');
define('APP', ROOT . '/app');
define('CONFIG', ROOT . '/config');
define('CACHE', ROOT . '/tmp/cache');
define('LAYOUT', 'default');

require '../core/libs/functions.php';

spl_autoload_register(function($class) {
  $file = ROOT . '/' . str_replace('\\', '/', $class) . '.php';
  if (is_file($file)) {
    require_once $file;
  }
});

new T;

Router::add('^page/(?P<action>[a-z-]+)/(?P<alias>[a-z-]+)$', ['controller' => 'Page']);
Router::add('^page/(?P<alias>[a-z-]+)$', ['controller' => 'Page', 'action' => 'view']);


// default  routes
Router::add('^$', ['controller' => 'Main', 'action' => 'index']);
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');

Router::dispatch($query);
