<?php

namespace app\controllers\admin;

use core\base\Controller;
use app\models\Main;

class AppController extends Controller
{
  public $layout = 'admin';

  public function __construct($route) {
    parent::__construct($route);

    new Main;
  }
}
