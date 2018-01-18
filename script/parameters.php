<?php

require_once ('vendor/autoload.php');

use Symfony\Component\Yaml\Parser;
use Symfony\Component\Yaml\Dumper;

if (!file_exists('config/parameters.yml')) {
    copy("config/parameters.yml.dist", "config/parameters.yml");
}

$yaml = new Parser();
$value = $yaml->parse(file_get_contents('config/parameters.yml'));

foreach ($value["parameters"] as $key => $val) {
    echo "\033[0;36m".$key."\033[1;33m[".$val."]: \033[0m";
    echo "\n";

}

$dumper = new Dumper();
$newFile = $dumper->dump($value, 2);

file_put_contents("config/parameters.yml", $newFile);
