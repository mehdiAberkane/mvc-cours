<?php

namespace Blog\Controller;
use Blog\Bdd\MySQL;
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

        $this->render("index");
    }
}
