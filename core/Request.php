<?php

/**
 * Class Request
 */
class Request {

    /**
     * Current url
     * @return string
     */
    public static function url()
    {
        return $_SERVER['REQUEST_URI'];
    }

    /**
     * Current Request Method
     * @return string
     */
    public static function method() {
        return strtolower($_SERVER['REQUEST_METHOD']);
    }
}