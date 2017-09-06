<?php

class Request {

    public static $url = null;

    public static function url()
    {
        if (isset($_GET['url'])) {
            $url = $_GET['url'];
            self::$url = $url;
            unset($_GET['url']);
            return $url;
        } else if(isset(self::$url)) {
            return self::$url;
        } else {
            return '/';
        }
    }

    public static function method() {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }
}