<?php

namespace Blog\Controller;

/**
 * Class IndexAction
 * @package src\Controller
 */
class IndexAction implements ActionInterface
{
    public function renderAction()
    {
        echo "page index";
    }
}
