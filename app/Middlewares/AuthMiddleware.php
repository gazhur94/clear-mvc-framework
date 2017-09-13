<?php

namespace Acme\Middlewares;

use Acme\Helpers\FlashMessage;
use Acme\Helpers\Session;
use Acme\Helpers\Redirect;

class AuthMiddleware
{
    public function before()
    {
        if (!Session::exists('user')) {
            FlashMessage::warning('You are not even logged in!');
            Redirect::back();
        }
    }

    public function after()
    {

    }
}