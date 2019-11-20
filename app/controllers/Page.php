<?php

namespace app\controllers;

use core\base\Controller;

class Page extends Controller 
{
    public function viewAction() {
        debug($this->route);
        echo 'Page::view';
    }
}