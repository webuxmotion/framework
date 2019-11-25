<?php

use core\Router;
use core\T;

$query = trim($_SERVER['REQUEST_URI'], '/');

define('DEBUG', 1);
define('WWW', __DIR__);
define('ROOT', dirname(__DIR__));
define('CORE', ROOT . '/core');
define('LIBS', ROOT . '/core/libs');
define('APP', ROOT . '/app');
define('CONFIG', ROOT . '/config');
define('CACHE', ROOT . '/tmp/cache');
define('LAYOUT', 'default');

require '../core/libs/functions.php';
require ROOT . '/vendor/autoload.php';

class_alias('\RedBeanPHP\R', '\R');

session_start();
new T();

Router::add('^page/(?P<action>[a-z-]+)/(?P<alias>[a-z-]+)$', ['controller' => 'Page']);
Router::add('^page/(?P<alias>[a-z-]+)$', ['controller' => 'Page', 'action' => 'view']);


// default  routes
Router::add('^admin$', ['controller' => 'User', 'action' => 'index', 'prefix' => 'admin']);
Router::add('^admin/(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$', ['prefix' => 'admin']);

Router::add('^$', ['controller' => 'Main', 'action' => 'index']);
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');

Router::dispatch($query);
