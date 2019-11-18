<?php

$query = rtrim($_SERVER['QUERY_STRING'], '/');
require '../core/libs/functions.php';
require '../core/Router.php';

Router::add('posts/add', ['controller' => 'Posts', 'action' => 'add']);
Router::add('posts', ['controller' => 'Posts', 'action' => 'index']);
Router::add('', ['controller' => 'Main', 'action' => 'index']);

debug(Router::getRoutes());

if (Router::matchRoute($query)) {
  debug(Router::getRoute());
} else {
  echo '404';
}
