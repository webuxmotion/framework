<?php
error_reporting(-1);

use core\Router;

$query = trim($_SERVER['REQUEST_URI'], '/');

define('WWW', __DIR__);
define('ROOT', dirname(__DIR__));
define('CORE', ROOT . '/core');
define('APP', ROOT . '/app');

require '../core/libs/functions.php';

spl_autoload_register(function($class) {
  $file = ROOT . '/' . str_replace('\\', '/', $class) . '.php';
  if (is_file($file)) {
    require_once $file;
  }
});

Router::add('^page/(?P<action>[a-z-]+)/(?P<alias>[a-z-]+)$', ['controller' => 'Page']);
Router::add('^page/(?P<alias>[a-z-]+)$', ['controller' => 'Page', 'action' => 'view']);

// default  routes
Router::add('^$', ['controller' => 'Main', 'action' => 'index']);
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');

Router::dispatch($query);
