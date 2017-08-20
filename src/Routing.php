<?php

namespace Blog;

use Blog\Controller\ActionInterface;
use Blog\Controller\AdminPostAction;
use Blog\Controller\AdminUserAction;
use Blog\Controller\ArticleAction;
use Blog\Controller\ContactAction;
use Blog\Controller\IndexAction;
use Blog\Controller\LoginAction;
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

        $className = substr($url, 1);

        if ($url == '' || $url == '/') {
            $action = new IndexAction();
            $action->renderAction();
        }

        switch ($className) {
            case "index":
                $action = new IndexAction();
                break;
            case strpos($className, "article"):
                $action = new ArticleAction();
                break;
            case "contact":
                $action = new ContactAction();
                break;
            case "admin/post":
                $action = new AdminPostAction();
                break;
            case "admin/user":
                $action = new AdminUserAction();
                break;
            case "admin/login":
                $action = new LoginAction();
                break;
        }

        if (!$action instanceof ActionInterface)
            $action = new LostAction();

        $action->renderAction();
    }
}
