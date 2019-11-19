<?php
error_reporting(-1);

use core\Router;

$query = rtrim($_SERVER['QUERY_STRING'], '/');

define('WWW', __DIR__);
define('ROOT', dirname(__DIR__));
define('CORE', ROOT . '/core');
define('APP', ROOT . '/app');

require '../core/libs/functions.php';

spl_autoload_register(function($class) {
  $file = ROOT . '/' . str_replace('\\', '/', $class) . '.php';
  echo $file . '<br>';
  if (is_file($file)) {
    require_once $file;
  }
});

Router::add('^pages/?(?P<action>[a-z-]+)?$', ['controller' => 'posts']);

// default  routes
Router::add('^$', ['controller' => 'Main', 'action' => 'index']);
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');

Router::dispatch($query);
