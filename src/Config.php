<?php

namespace Blog;

use Symfony\Component\Yaml\Parser;

/**
 * Class Config
 * @package Blog
 */
class Config
{
    /**
     * @var array $config
     */
    private static $config;

    /**
     * @var array $params
     */
    private $params;

    /**
     * @param $params
     * @return array|Config
     */
    public static function init(){
        if (is_null(Config::$config)) {
            self::$config = new Config();
        }

        return self::$config;
    }

    /**
     * Config constructor.
     */
    public function __construct()
    {
        $yaml = new Parser();

        $value = $yaml->parse( file_get_contents('config/parameters.yml' ) );

        $dbParams = array(
            'driver'   => 'pdo_mysql',
            'user'     => $value["db"]['user'],
            'password' => $value["db"]['password'],
            'dbname'   => $value["db"]['name'],
        );

        $this->params = $dbParams;
    }

    public function getParam($key)
    {
        return $this->params[$key];
    }
}
