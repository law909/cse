<?php

namespace controllers;

use cse\TemplateFactory;

class homeController extends Controller
{
    public function view()
    {
        $view = TemplateFactory::createSmarty();
        $view->assign('a', $this->params->getStringRequestParam('a'));
        $view->display('home.tpl');
    }
}