<?php


namespace Blog\Controller;

/**
 * Class MasterController
 * @package Blog\Controller
 */
class MasterController
{
    /**
     * @param String $file
     */
    protected function render($file, $param = null)
    {
        $path = "src/Views/" . $file . ".php";
        $param = $param;

        require_once "src/Views/Common/_base.php";
    }
}
