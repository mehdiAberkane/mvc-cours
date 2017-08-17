<?php

namespace Blog;

/**
 * Class Autoloader
 * @package Blog
 */
class Autoloader
{
    /**
     * Call the method autoload
     */
    public static function register()
    {
        spl_autoload_register([__CLASS__, "autoload"]);
    }

    /**
     * @param String $name
     */
    public static function autoload($name)
    {
        $paths = preg_split('#\\\#', $name);
        $name = array_pop($paths);

        array_shift($paths);
        $path = implode(DS, $paths);

        $file = $name.'.php';
        $filepath = dirname(__FILE__).DS.strtolower($path).DS.$file;


        require $filepath;
    }
}
