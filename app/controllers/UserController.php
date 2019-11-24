<?php

namespace app\controllers;

use app\models\User;

class UserController extends AppController
{
  public function signupAction() {
    if ($this->isPost()) {
      $user = new User();
      $data = $_POST;
      $user->load($data);
      if ($user->validate($data)) {
        echo 'valid';
      } else {
        echo 'no';
      }
      die;
    }
    $this->setMeta('Signup');
  }

  public function loginAction() {

  }

  public function logoutAction() {

  }
}
