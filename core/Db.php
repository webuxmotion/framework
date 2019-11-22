<?php

namespace core;

class Db
{
    protected $pdo;
    protected static $instance;
    public static $countSql = 0;
    public static $queries = [];

    protected function __construct() {
        $db = require CONFIG . '/config_db.php';
        $options = [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
        ];
        $this->pdo = new \PDO($db['dsn'], $db['user'], $db['pass'], $options);
    }

    public static function instance() {
        if (self::$instance === null) {
            self::$instance = new self;
        }
        return self::$instance;
    }

    public function execute($sql) {
        self::updateCounter($sql);

        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute();
    }

    public function query($sql) {
        self::updateCounter($sql);
        $stmt = $this->pdo->prepare($sql);
        $res = $stmt->execute();
        if ($res !== false) {
            return $stmt->fetchAll();
        }
        return [];
    }

    private static function updateCounter($sql) {
        self::$countSql++;
        self::$queries[] = $sql;
    }
}