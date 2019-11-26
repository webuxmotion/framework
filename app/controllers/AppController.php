<?php

namespace app\controllers;

use core\base\Controller;
use app\models\Main;
use core\T;
use core\widgets\language\Language;

class AppController extends Controller
{
  public function __construct($route) {
    parent::__construct($route);

    new Main;

    T::$one->setProperty('langs', Language::getLanguages());
    T::$one->setProperty('lang', Language::getLanguage(T::$one->getProperty('langs')));
    debug(T::$one->getProperty('lang'));
  }
}
