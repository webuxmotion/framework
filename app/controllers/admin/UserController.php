<?php

namespace app\controllers\admin;

class UserController extends AppController
{
  public function indexAction() {
    $test = 'test data';
    $this->setMeta('Admin dashboard');
    $this->set(compact('test'));
  }

  public function testAction() {

  }
}
