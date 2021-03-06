<?php

namespace core;

class Router
{
  public function __construct() {
    //echo 'Привет мир';
  }

  protected static $routes = [];
  protected static $route = [];

  public static function add($regexp, $route = []) {
    self::$routes[$regexp] = $route;
  }

  public static function getRoutes() {
    return self::$routes;
  }

  public static function getRoute() {
    return self::$route;
  }

  public static function matchRoute($url) {
    foreach (self::$routes as $pattern => $route) {
      if (preg_match("#$pattern#i", $url, $matches)) {
        foreach ($matches as $key => $val) {
          if (is_string($key)) {
            $route[$key] = $val;
          }
        }
        if (!isset($route['action'])) {
          $route['action'] = 'index';
        }
        // prefix for admin controllers
        if (!isset($route['prefix'])) {
          $route['prefix'] = '';
        } else {
          $route['prefix'] .= '\\';
        }

        $route['controller'] = self::upperCamelCase($route['controller']);
        self::$route = $route;
        return true;
      }
    }
    return false;
  }

  public static function dispatch($url) {
    $url = self::removeQueryString($url);
    if (self::matchRoute($url)) {
      $controller = 'app\controllers\\' . self::$route['prefix'] . self::$route['controller'] . 'Controller';

      if (class_exists($controller)) {
        $cObj = new $controller(self::$route);
        $action = self::$route['action'];
        $action = self::lowerCamelCase($action) . 'Action';
        if (method_exists($cObj, $action)) {
          $cObj->$action();
          $cObj->getView();
        } else {
          //echo "Method <b>$controller::$action</b> does not found";
          throw new \Exception("Method <b>$controller::$action</b> does not found", 404);
        }
      } else {
        //echo "Controller <b>$controller</b> does not found";
        throw new \Exception("Controller <b>$controller</b> does not found", 404);
      }
    } else {
      //http_response_code(404);
      //include '404.html';
      throw new \Exception("Page not found", 404);
    }
  }

  protected static function upperCamelCase($name) {
    $name = str_replace('-', ' ', $name);   
    $name = ucwords($name);
    $name = str_replace(' ', '', $name);
    return $name;
  }

  protected static function lowerCamelCase($name) {
    $name = lcfirst(self::upperCamelCase($name));
    return $name;
  }

  protected static function removeQueryString($url) {
    if ($url) {
      $params = explode('?', $url, 2);
      if (strpos($params[0], '=') === false) {
        return rtrim($params[0], '/');
      }
      return '';
    }
    return $url;
  }
}
