<?php

namespace app\controllers;

class NewPosts extends App
{
  public function indexAction() {
    
  }

  public function testAction() {
    $name = 'Andrii';
    $surname = 'Pereverziev';
    $this->set(compact('name', 'surname'));
  }
}
