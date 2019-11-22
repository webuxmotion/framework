<?php

namespace app\controllers;

use app\models\Main;

class MainController extends AppController
{
  public function indexAction() {
    $model = new Main();
    $posts = $model->findAll();
    $posts2 = $model->findAll();
    $this->set(compact('posts'));
  }
}
