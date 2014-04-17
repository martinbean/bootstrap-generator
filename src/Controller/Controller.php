<?php
namespace MCB\Bootstrap\Generator\Controller;

abstract class Controller
{
    protected $container;

    public function __construct(\Pimple $container)
    {
        $this->container = $container;

        $this->view = new \MCB\Bootstrap\Generator\View\View();
    }

    public function getViewData()
    {
        return $this->view->toArray();
    }
}
