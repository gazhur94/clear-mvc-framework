<?php

namespace Acme\Helpers;

class Redirect
{
    public static function route($name)
    {
        self::url(route($name));
    }

    public static function url($path)
    {
        if (headers_sent()) {
            die("<script>window.location = '{$path}';</script>");
        } else {
            header("Location: {$path}");
            die();
        }
    }

//    public static function back($message = null, $status = 'success') {
//        return self::to(Session::get(Config::get('session/previousPage')), $message, $status);
//    }
}