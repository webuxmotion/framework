<?php

$query = rtrim($_SERVER['QUERY_STRING'], '/');
require '../core/libs/functions.php';
require '../core/Router.php';
require '../app/controllers/Main.php';
require '../app/controllers/Posts.php';
require '../app/controllers/NewPosts.php';

//Router::add('posts/add', ['controller' => 'Posts', 'action' => 'add']);
//Router::add('posts', ['controller' => 'Posts', 'action' => 'index']);
//Router::add('', ['controller' => 'Main', 'action' => 'index']);

Router::add('^$', ['controller' => 'Main', 'action' => 'index']);
Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');

Router::dispatch($query);
