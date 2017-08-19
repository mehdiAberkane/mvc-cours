<?php

namespace Blog\Controller;

use src\Entity\Post;

/**
 * Class IndexAction
 * @package src\Controller
 */
class ArticleAction extends MasterController implements ActionInterface
{
    public function renderAction()
    {
        $urls = $this->getUrl();
        $post = new Post();

        $post = $post->getOne("slug", end($urls));


        $this->render("article", ["post" => $post]);
    }
}
