<?php

namespace Blog\Bdd;

class MySQL
{
    private static $bdd;

    public static function init(){
        if (!self::$bdd instanceof self::class) {
            self::$bdd = new Mysql();
        }

        return self::$bdd;
    }

    public function __construct($table, $user, $password)
    {
        try {
            $pdo = new \PDO('mysql:host=localhost;dbname='.$table.';charset=utf8', $user, $password);
        } catch (\PDOException $e){
            throw $e;
        }
    }
}
