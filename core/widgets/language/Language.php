<?php

namespace core\widgets\language;

use core\T;

class Language
{
  protected $tpl;
  protected $languages;
  protected $language;

  public function __construct() {
    $this->tpl = __DIR__ . '/lang_tpl.php';
    $this->run();
  }

  protected function run() {
    $this->languages = T::$one->getProperty('langs');
    $this->language = T::$one->getProperty('lang');
    echo $this->getHtml();
  }

  public static function getLanguages() {
    return \R::getAssoc("SELECT code, title, base FROM languages");
  }

  public static function getLanguage($languages) {
    if (isset($_COOKIE['lang']) && array_key_exists($_COOKIE['lang'], $languages)) {
      $key = $_COOKIE['lang'];
    } else {
      $key = key($languages);
      foreach ($languages as $k => $item) {
        if ($item['base'] == 1) {
          $key = $k;
          continue;
        }
      }
    }
    $lang = $languages[$key];
    $lang['code'] = $key;
    return $lang;
  }

  public function getHtml() {
    ob_start();
    require_once $this->tpl;
    return ob_get_clean();
  }
}