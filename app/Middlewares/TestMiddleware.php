<?php

namespace Acme\Middlewares;

class TestMiddleware
{
    public function before()
    {
        echo 'Middlewared!!!!!!111';
    }

    public function after() {
        echo 'Done!';
    }
}