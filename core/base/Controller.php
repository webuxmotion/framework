<?php

namespace core\base;

abstract class Controller
{
  public $route = [];
  public $view;
  public $layout;
  public $vars = [];
  public $meta = ['title' => '', 'desc' => '', 'keywords' => ''];

  public function __construct($route) {
    $this->route = $route;
    $this->view = $route['action'];
  }

  public function getView() {
    $vObj = new View($this->route, $this->layout, $this->view, $this->meta);
    $vObj->render($this->vars);
  }

  public function set($vars) {
    $this->vars = $vars;
  }

  public function isAjax() {
    return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && $_SERVER['HTTP_X_REQUESTED_WITH'] === 'XMLHttpRequest';
  }

  public function isPost() {
    return $_SERVER['REQUEST_METHOD'] == 'POST';
  }

  public function loadView($view, $vars = []) {
    extract($vars);
    require APP . "/views/{$this->route['controller']}/{$view}.php";
  }

  public function setMeta($title = '', $desc = '', $keywords = ''){
    $this->meta['title'] = $title;
    $this->meta['desc'] = $desc;
    $this->meta['keywords'] = $keywords;
  }
}
