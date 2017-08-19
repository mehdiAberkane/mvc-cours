<?php

namespace Blog\Controller;

use src\Entity\User;

/**
 * Class AdminPostAction
 * @package src\Controller
 */
class AdminUserAction extends MasterController implements ActionInterface
{
    public function renderAction()
    {
        $response = [];
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $postEntity = new User();
            $title = isset($_REQUEST["title"]) ? $_REQUEST["title"] : "";
            $content = isset($_REQUEST["content"]) ? $_REQUEST["content"] : "";

            $postEntity->setTitle($title);
            $postEntity->setContent($content);

            $response[] = $postEntity->create();
        }

        $this->render("admin/post", $response);
    }
}
