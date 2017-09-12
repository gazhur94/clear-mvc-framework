<?php

namespace Acme\Middlewares;

use Acme\Helpers\Token;
use Acme\Helpers\Input;

class CsrfMiddleware
{
    public function before()
    {
        if (!Token::check('csrf', Input::csrf())) {
            throw new \CoreException('CSRF TOKEN IS NOT VALID!');
        }
    }

    public function after()
    {

    }
}