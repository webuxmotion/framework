<?php

namespace app\controllers;

use app\models\Main;
use core\App;

class MainController extends AppController
{
  public function indexAction() {
    $model = new Main();
    $posts = App::$app->cache->get('posts');
    if (!$posts) {
      $posts = $model->findAll();
      App::$app->cache->set('posts', $posts);
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
    //debug($data3);
    $this->set(compact('posts'));
  }

  public function testAction() {
    if ($this->isAjax()) {
      echo '111';
      die;
    }
  }
}
