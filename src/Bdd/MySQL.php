<?php

namespace Blog\Bdd;

use Blog\Config;

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
    public static function init() {
        if (is_null(self::$bdd)) {
            self::$bdd = new Mysql();
        }

        return self::$bdd;
    }

    /**
     * MySQL construct.
     */
    public function __construct()
    {
        $config = Config::init();
    
	    try {
            $this->pdo = new \PDO('mysql:host='.$config->getParam("host").';dbname=mvc;charset=utf8','chevre', 'chevre');

            #$this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e){
            throw $e;
        }
    }

    public function getPDO()
    {
        return $this->pdo;
    }
}
