<?php

namespace Acme\Controllers;

class HomeController extends Controller
{
    public function getMain()
    {

        $var = 'Hello from HomeController@getMain';
        dump($var);

        return $this->view->render(layout('main'), page('main'), [
            'name' => $var
        ]);
    }
}