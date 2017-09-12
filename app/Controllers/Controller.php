<?php

namespace Acme\Controllers;

use Acme\Views\View;

use Acme\Helpers\Session;
use Illuminate\Http\Response;

class Controller
{

    public function __construct(View $view)
    {
        Session::start();
        $this->view = $view;
    }

//    public function render()
//    {
//        $this->view->render();
//    }
}