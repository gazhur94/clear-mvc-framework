<?php

namespace Acme\Controllers;

class HomeController extends Controller
{
    public function getMain()
    {

        $var = 'Hello from HomeController@getMain';
        dump($var);

        $this->view->render('main', 'main', [
            'name' => $var
        ]);
    }
}