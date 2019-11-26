<?php

namespace app\controllers;

use app\models\Main;
use core\libs\Pagination;
use core\T;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use PHPMailer\PHPMailer\PHPMailer;

class MainController extends AppController
{
  public function indexAction() {
    $lang = T::$one->getProperty('lang')['code'];
    $total = \R::count('posts', 'lang_code = ?', [$lang]);
    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $perpage = 4;
    $pagination = new Pagination($page, $perpage, $total);
    $start = $pagination->getStart();

//    $posts = T::$one->cache->get('posts');
//    if (!$posts) {
//      $posts = \R::findAll('posts', "LIMIT $start, $perpage");
//      T::$one->cache->set('posts', $posts);
//    }
    $posts = \R::findAll('posts', "lang_code = ? LIMIT $start, $perpage", [$lang]);
    $this->setMeta('Main page');
    $this->set(compact('posts','pagination'));
  }

  public function testAction() {
    // create a log channel
    $log = new Logger('name');
    $log->pushHandler(new StreamHandler(ROOT . '/tmp/myerrors.log', Logger::WARNING));

    // add records to the log
    $log->warning('Foo');
    $log->error('Bar');

//    $mailer = new PHPMailer();
//    debug($mailer);

    $this->setMeta('Test page', 'a', 'b');
    if ($this->isAjax()) {
      $model = new Main();
      $post = \R::findOne('posts', "id = {$_POST['id']}"); 
      $this->loadView('shared/post', compact('post'));
      die;
    }
  }
}
