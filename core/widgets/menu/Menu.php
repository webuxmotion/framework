<?php

namespace core\widgets\menu;

use app\models\Main;

class Menu {
    public $data;
    public $tree;
    public $menuHtml;
    public $tpl;
    public $container;
    public $table;
    public $cache;

    public function __construct() {
      new Main();
      $this->run();

    }

    protected function run() {
      $this->data = \R::getAssoc("SELECT * FROM categories");
      $this->tree = $this->getTree();
    }

    protected function getTree() {
      $tree = [];
      $dataset = $this->data;

      foreach ($dataset as $id=>&$node) {
        if (!$node['parent']){
          $tree[$id] = &$node;
        } else {
          $dataset[$node['parent']]['childs'][$id] = &$node;
        }
      }

      return $tree;
    }

    function getMenuHtml($tree, $tab = ''){

    }

    function catToTemplate($category, $tab, $id){

    }
}