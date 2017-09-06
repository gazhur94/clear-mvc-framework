<?php

namespace Acme\Controllers;

use Acme\Views\View;

class Controller
{
    public function __construct(View $view)
    {
        $this->view = $view;
    }

}