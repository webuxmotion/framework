<?php

namespace core;

class T
{
    public static $one;

    public function __construct() {
        self::$one = Registry::instance();
        new ErrorHandler();
    }
}
