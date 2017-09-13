<?php

namespace Acme\Middlewares;

use Acme\Helpers\FlashMessage;
use Acme\Helpers\Session;
use Acme\Helpers\Redirect;

class GuestMiddleware
{
    public function before()
    {
        if (Session::exists('user')) {
            FlashMessage::danger('You cannot do it!');
            Redirect::route('home');
        }
    }

    public function after()
    {

    }
}