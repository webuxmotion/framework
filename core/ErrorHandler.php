<?php

namespace core;

class ErrorHandler 
{
  public function __construct() {
    if (DEBUG) {
      error_reporting(-1);
    } else {
      error_reporting(0);
    }
    set_error_handler([$this, 'errorHandler']);
    ob_start(); 
    register_shutdown_function([$this, 'fatalErrorHandler']);
    set_exception_handler([$this, 'exceptionHandler']);
  }

  public function errorHandler($errno, $errstr, $errfile, $errline) {
    $this->logError($errstr, $errfile, $errline);
    if (DEBUG || in_array($errno, [E_USER_ERROR, E_RECOVERABLE_ERROR])) {
      $this->displayError($errno, $errstr, $errfile, $errline, 500);
    }
    return true;
  }

  public function displayError($errno, $errstr, $errfile, $errline, $response = 500) {
    http_response_code($response);
    if ($response == 404) {
      require WWW . '/errors/404.php';
      die;
    }
    if (DEBUG) {
      require WWW . '/errors/dev.php';
    } else {
      require WWW . '/errors/prod.php';
    }
    die;
  }

  public function exceptionHandler($e) {
    $this->logError($e->getMessage(), $e->getFile(), $e->getLine());
    $this->displayError('Exception', $e->getMessage(), $e->getFile(), $e->getLine(), $e->getCode());
  }

  public function fatalErrorHandler() {
    $error = error_get_last();
    if (!empty($error) && $error['type'] & ( E_ERROR | E_PARSE | E_COMPILE_ERROR | E_CORE_ERROR)) {
      ob_end_clean(); 
      $this->logError($error['message'], $error['file'], $error['line']);
      $this->displayError($error['type'], $error['message'], $error['file'], $error['line']);
    } else {
      ob_end_flush();
    }
  }

  public function logError($errstr, $errfile, $errline) {
    error_log("[" . date('Y-m-d H:i:s') . "] Error text: {$errstr} | File: {$errfile} | Line: {$errline}\n======\n", 3, ROOT . '/tmp/errors.log');
  }
}
