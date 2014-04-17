<?php
namespace MCB\Bootstrap\Generator\Controller;

class ThemesController extends Controller
{
    public function index()
    {
        $themes = new \MCB\Bootstrap\Generator\Repository\ThemeRepository($this->container['database']);

        $this->view->latest = $themes->findLatest(10);
    }
}
