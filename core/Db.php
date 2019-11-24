<?php

namespace core;

class Db
{
    use TSingletone;

    protected $pdo;
    public static $countSql = 0;
    public static $queries = [];

    protected function __construct() {
        $db = require CONFIG . '/config_db.php';
        $options = [
            \PDO::ATTR_ERRMODE => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
        ];
        $this->pdo = new \PDO($db['dsn'], $db['user'], $db['pass'], $options);

        \R::setup($db['dsn'], $db['user'], $db['pass']);
        \R::freeze(true);
    }

    public function execute($sql) {
        self::updateCounter($sql);

        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute();
    }

    public function query($sql, $params = []) {
        self::updateCounter($sql);
        $stmt = $this->pdo->prepare($sql);
        $res = $stmt->execute($params);
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
