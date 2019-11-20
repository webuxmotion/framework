<?php

namespace app\controllers;

class NewPosts
{
  public function indexAction() {
    echo __METHOD__;
  }

  public function testAction() {
    echo __METHOD__;
    debug($_GET);
    debug($_SERVER);
  }
}
