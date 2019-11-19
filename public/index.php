<?php

$query = rtrim($_SERVER['QUERY_STRING'], '/');

define('WWW', __DIR__);
define('ROOT', dirname(__DIR__));
define('CORE', ROOT . '/core');
define('APP', ROOT . '/app');

require '../core/libs/functions.php';
require '../core/Router.php';

spl_autoload_register(function($class) {
  $file = APP . "/controllers/$class.php";
  if (is_file($file)) {
    require $file;
  }
});

Router::add('^pages/?(?P<action>[a-z-]+)?$', ['controller' => 'posts']);

// default  routes
Router::add('^$', ['controller' => 'Main', 'action' => 'index']);
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');

Router::dispatch($query);
