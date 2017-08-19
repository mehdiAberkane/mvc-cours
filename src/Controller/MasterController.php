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
    protected function render($file, $datas = array())
    {
        $path = "src/Views/" . $file . ".php";

        foreach ($datas as $key => $data){
                ${$key} = $data;
        }

        require_once "src/Views/Common/_base.php";
    }
}
