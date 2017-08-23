<?php

namespace Blog\Controller;

use src\Entity\Log;
use src\Entity\Post;

/**
 * Class IndexAction
 * @package src\Controller
 */
class IndexAction extends MasterController implements ActionInterface
{
    public function renderAction()
    {
        $t = new Log();

        $t->writeAccessLog("warning", "yolo");

        $postEntity = new Post();

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            $search = isset($_REQUEST["search"]) ? $_REQUEST["search"] : "";
            $posts = $postEntity->findBy("title", $search);
        } else {
            $posts = $postEntity->getAll();
        }

        $this->render("index", ["posts" => $posts, "test" => "toto"]);
    }
}
