<?php

namespace Blog;

use Blog\Controller\ActionInterface;
use Blog\Controller\ContactAction;
use Blog\Controller\IndexAction;
use Blog\Controller\LostAction;

/**
 * Class Routing
 * @package Blog
 */
class Routing
{
    public static function routing()
    {
        $url = $_SERVER["REQUEST_URI"];
        $action = "";

        if ($url == '' || $url == '/') {
            $action = new IndexAction();
        }

        $className = substr($url, 1);

        switch ($className) {
            case "index":
                $action = new IndexAction();
                break;
            case "contact":
                $action = new ContactAction();
                break;
        }

        if (!$action instanceof ActionInterface)
            $action = new LostAction();

        $action->renderAction();
    }
}
