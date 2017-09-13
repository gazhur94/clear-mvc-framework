<?php

namespace Acme\Helpers;

class Session {

    private static $_isSessionStarted = false;

    public static function start() {
        if (self::$_isSessionStarted == false) {
            session_start();
            self::$_isSessionStarted = true;
        }
    }

    public static function exists($name) {
        return (isset($_SESSION[$name])) ? true : false;
    }

    public static function set($name, $value) {
        $_SESSION[$name] = $value;
    }

    public static function get($name) {
        return $_SESSION[$name];
    }

    public static function delete($name) {
        if (self::exists($name)) {
            unset($_SESSION[$name]);
        }
    }
}