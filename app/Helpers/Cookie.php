<?php

namespace Acme\Helpers;

class Cookie {

    /**
     * Check if value exists in $_COOKIE array
     *
     * @param $name
     * @return bool
     */
    public static function exists($name) {
        return (isset($_COOKIE[$name])) ? true : false;
    }

    /**
     * Return value from $_COOKIE array
     *
     * @param $name string
     * @return mixed
     */
    public static function get($name) {
        return $_COOKIE[$name];
    }

    /**
     * Set Cookie
     *
     * @param $name
     * @param $value
     * @param $expiry
     * @return bool
     */
    public static function set($name, $value, $expiry) {
        setcookie($name, $value, time() + $expiry, '/');
    }

    /**
     * Unset cookie
     *
     * @param $name
     */
    public static function delete($name) {
        self::set($name, '', time() - 1);
    }
}