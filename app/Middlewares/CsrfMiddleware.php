<?php

class CsrfMiddleware extends Middleware
{
    public function before()
    {
        echo 'Middlewared!!!!!!111';
    }
}