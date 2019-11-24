<?php

require 'rb.php';
$db = require '../config/config_db.php';

R::setup( $db['dsn'], $db['user'], $db['pass']);
//R::freeze(true);
R::fancyDebug(TRUE);


// $isConnected = R::testConnection();
// var_dump($isConnected);

// Create
// $cat = R::dispense('category');
// $cat->title = 'Cat 3';
// $id = R::store($cat);
// var_dump($id);

// Read
// $cat = R::load('category', 2);
// print_r($cat->title);
// print_r($cat['title']);

// Update
// $cat = R::load('category', 3);
// echo $cat->title . '<br>';
// $cat->title = "Category Updateddd";
// echo $cat->title . '<br>';
// R::store($cat);

// Delete
// $cat = R::load('category', 2);
// R::trash($cat);

//R::wipe('category');


//$cats = R::findAll('category');
//$cats = R::findAll('category', 'id > ?', [2]);
$cats = R::findAll('category', 'title LIKE ?', ['%at%']);
$cat = R::findOne('category', 'id = ?', [2]);
print_r($cat);