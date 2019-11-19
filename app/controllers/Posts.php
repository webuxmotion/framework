<?php

namespace app\controllers;

use core\base\Controller;

class Posts extends Controller
{
  public function indexAction() {
    debug($this->route);
  }
}
