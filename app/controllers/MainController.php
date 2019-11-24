<?php

namespace app\controllers;

use app\models\Main;
use core\T;

class MainController extends AppController
{
  public function indexAction() {
    $model = new Main();
    $posts = T::$one->cache->get('posts');
    if (!$posts) {
      $posts = $model->findAll();
      T::$one->cache->set('posts', $posts);
    }
    $postOne = $model->findOne(4, 'category_id');
    $data = $model->exec("SELECT * FROM {$model->table} ORDER BY id DESC LIMIT 2");
    $data2 = $model->exec(
      "SELECT * FROM {$model->table} 
       WHERE title LIKE ? 
       ORDER BY id DESC LIMIT 2", 
      ['%то%']
    );
    $data3 = $model->like('тор', 'title');
    $this->set(compact('posts'));
  }

  public function testAction() {
    $this->setMeta('Test page', 'a', 'b');
    if ($this->isAjax()) {
      $model = new Main();
      $post = \R::findOne('posts', "id = {$_POST['id']}"); 
      $this->loadView('shared/post', compact('post'));
      die;
    }
  }
}
