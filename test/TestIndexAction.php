<?php

namespace test;

/**
 * Class TestIndexAction
 * @package test
 */
class TestIndexAction
{
    private $indexAction;

    public function __construct()
    {
        $this->indexAction = new \src\Controller\IndexAction();
    }
}
