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
      if (!$user->validate($data) || !$user->checkUnique()) {
        $user->getErrors();
        $_SESSION['form_data'] = $data;
        redirect();
      }
      $user->attributes['password'] = password_hash($user->attributes['password'], PASSWORD_DEFAULT);
      if ($user->save('user')) {
        $_SESSION['success'] = 'You registered!';
      } else {
        $_SESSION['error'] = 'Error. Try again!';
      }
      redirect();
    }
    $this->setMeta('Signup');
  }

  public function loginAction() {

  }

  public function logoutAction() {

  }
}
