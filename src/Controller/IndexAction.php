<?php

namespace Blog\Controller;

use src\Entity\Post;

/**
 * Class IndexAction
 * @package src\Controller
 */
class IndexAction extends MasterController implements ActionInterface
{
    public function renderAction()
    {
        $postEntity = new Post();

        $posts = $postEntity->getAll();

        $this->render("index", ["posts" => $posts, "test" => "toto"]);
    }
}
