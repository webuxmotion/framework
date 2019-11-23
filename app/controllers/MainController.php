<?php

namespace app\controllers;

use app\models\Main;

class MainController extends AppController
{
  public function indexAction() {
    $model = new Main();
    $posts = $model->findAll();
    $posts2 = $model->findAll();
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
}
