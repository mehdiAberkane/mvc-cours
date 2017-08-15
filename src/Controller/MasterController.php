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
    protected function render($file)
    {
        require_once "src/Views/" . $file . ".php";
    }
}
