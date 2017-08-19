<?php

namespace Blog\Controller;

use src\Entity\Post;

/**
 * Class AdminPostAction
 * @package src\Controller
 */
class AdminPostAction extends MasterController implements ActionInterface
{
    public function renderAction()
    {
        $response = [];
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $postEntity = new Post();
            $title = isset($_REQUEST["title"]) ? $_REQUEST["title"] : "";
            $content = isset($_REQUEST["content"]) ? $_REQUEST["content"] : "";

            $postEntity->setTitle($title);
            $postEntity->setContent($content);

            $response[] = $postEntity->create();
        }

        $this->render("admin/post", $response);
    }
}
