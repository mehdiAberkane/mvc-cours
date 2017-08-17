<?php

namespace Blog\Bdd;

/**
 * Class MySQL
 * @package Blog\Bdd
 */
class MySQL
{
    /**
     * @var MySQL $bdd
     */
    private static $bdd;

    /**
     * @var \PDO $pdo
     */
    private $pdo;

    /**
     * @return MySQL
     */
    public static function init($table, $user, $password){
        if (!self::$bdd instanceof self::class) {
            self::$bdd = new Mysql($table, $user, $password);
        }

        return self::$bdd;
    }

    /**
     * MySQL constructor.
     * @param $table
     * @param $user
     * @param $password
     */
    public function __construct($table, $user, $password)
    {
        try {
            $this->pdo = new \PDO('mysql:host=localhost;dbname='.$table.';charset=utf8', $user, $password);
        } catch (\PDOException $e){
            throw $e;
        }
    }

    public function getPDO()
    {
        return $this->pdo;
    }
}
