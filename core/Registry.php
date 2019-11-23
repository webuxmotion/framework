<?php

namespace core;

class Registry
{
    public static $objects = [];
    protected static $instance;
    
    protected function __construct() {
        require_once CONFIG . '/config.php';
        foreach ($config['components'] as $name => $component) {
            self::$objects[$name] = new $component;
        }
    }

    public static function instance() {
        if (self::$instance === null) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function __get($name) {
        if (is_object(self::$objects[$name])) {
            return self::$objects[$name];
        }
    }

    public function __set($name, $obj) {
        if (!isset(self::$objects[$name])) {
            self::$objects[$name] = new $obj;
        }
    }

    public function getList() {
        echo '<pre>';
        var_dump(self::$objects);
        echo '</pre>';
    }
}