<?php

namespace app\controllers;

class NewPostsController extends AppController
{
  public function indexAction() {
    
  }

  public function testAction() {
    $name = 'Andrii';
    $surname = 'Pereverziev';
    $this->set(compact('name', 'surname'));
  }
}
