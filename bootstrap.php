<?php

require_once ('vendor/autoload.php');

include ('src/Controller/IndexAction.php');

$yaml = new \Symfony\Component\Yaml\Parser();

$value = $yaml->parse( file_get_contents('config/parameters.yml' ) );

var_dump($value);

session_start();
$dbParams = array(
    'driver'   => 'pdo_mysql',
    'user'     => $value['user'],
    'password' => $value['password'],
    'dbname'   => $value['name'],
);



$start = new \src\Controller\IndexAction();

echo $start;
