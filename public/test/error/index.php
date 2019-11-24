<?php

define("DEBUG", 1);

class NotFoundException extends Exception {
  public function __construct($message = '', $code = 404) {
    parent::__construct($message, $code);
  }
}

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
    $this->displayError($errno, $errstr, $errfile, $errline, 500);
    return true;
  }

  public function displayError($errno, $errstr, $errfile, $errline, $response = 500) {
    error_log("[" . date('Y-m-d H:i:s') . "] Error text: {$errstr} | File: {$errfile} | Line: {$errline}\n======\n", 3, __DIR__ . '/errors.log');
    http_response_code($response);
    if (DEBUG) {
      require 'views/dev.php';
    } else {
      require 'views/prod.php';
    }
    die;
  }

  public function exceptionHandler($e) {
    $this->displayError('Exception', $e->getMessage(), $e->getFile(), $e->getLine(), $e->getCode());
  }

  public function fatalErrorHandler() {
    $error = error_get_last();
    if (!empty($error) && $error['type'] & ( E_ERROR | E_PARSE | E_COMPILE_ERROR | E_CORE_ERROR)) {
      ob_end_clean(); 
      $this->displayError($error['type'], $error['message'], $error['file'], $error['line']);
    } else {
      ob_end_flush();
    }
  }
}

new ErrorHandler();

//test();
/*
try {
  if (empty($test)) {
    throw new Exception('Ups, exception');
  }
} catch (Exception $e) {
  var_dump($e);
}
 */

//throw new Exception('Ups, exception');
throw new NotFoundException('Page not found');
