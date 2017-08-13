<?php

namespace test;

/**
 * Class TestIndexAction
 * @package test
 */
class TestIndexAction
{
    /**
     * @var \src\Controller\IndexAction $indexAction
     */
    private $indexAction;

    public function __construct()
    {
        $this->indexAction = new \src\Controller\IndexAction();
    }

    public function testAction()
    {
        echo $this->getIndexAction();
    }

    /**
     * @return \src\Controller\IndexAction
     */
    public function getIndexAction()
    {
        return $this->indexAction;
    }

    /**
     * @param \src\Controller\IndexAction $indexAction
     */
    public function setIndexAction($indexAction)
    {
        $this->indexAction = $indexAction;
    }

}
