<?php
/**
 * Created by PhpStorm.
 * User: andriipereverziev
 * Date: 11/27/19
 * Time: 12:48 AM
 */

namespace app\controllers;

use core\T;

class LanguageController extends AppController
{
  public function changeAction() {
    $lang = !empty($_GET['lang']) ? $_GET['lang'] : null;
    if ($lang) {
      if (array_key_exists($lang, T::$one->getProperty('langs'))) {
        setcookie('lang', $lang, time() + 3600*24*7, '/');
      }
    }
    redirect();
  }
}