<?php

namespace Acme\Controllers;

class HomeController extends Controller
{
    public function getMain()
    {
        $this->view->render('main', 'main');
    }
}