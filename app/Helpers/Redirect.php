<?php

namespace Acme\Helpers;

class Redirect
{
    /**
     * Redirect to route
     *
     * @param $name
     */
    public static function route($name)
    {
        self::url(route($name));
    }

    /**
     * Redirect to url
     *
     * @param $path
     */
    public static function url($path)
    {
        /** Redirect if headers already sent */
        if (headers_sent()) {
            die("<script>window.location = '{$path}';</script>");
        } else {
            /** Send redirect header */
            header("Location: {$path}");
            die();
        }
    }

    /**
     * Redirect to previous page
     */
    public static function back()
    {
        self::url(Session::get('PREVIOUS_PAGE'));
    }
}