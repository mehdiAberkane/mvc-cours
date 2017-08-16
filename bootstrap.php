<?php

require_once ('vendor/autoload.php');
require_once ('src/Autoloader.php');

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', __DIR__);

\Blog\Autoloader::register();

$yaml = new \Symfony\Component\Yaml\Parser();

$value = $yaml->parse( file_get_contents('config/parameters.yml' ) );

session_start();

$dbParams = array(
    'driver'   => 'pdo_mysql',
    'user'     => $value["db"]['user'],
    'password' => $value["db"]['password'],
    'dbname'   => $value["db"]['name'],
);

\Blog\Routing::routing();
