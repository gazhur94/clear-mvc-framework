<?php

namespace Acme\Helpers;

class Session {

    /** @var bool if session is started already */
    private static $_isSessionStarted = false;

    /**
     * Start session if one is not started yet
     */
    public static function start() {
        if (self::$_isSessionStarted == false) {
            session_start();
            self::$_isSessionStarted = true;
        }
    }

    /**
     * Check if value exists in Session array
     *
     * @param $name
     * @return bool
     */
    public static function exists($name) {
        return (isset($_SESSION[$name])) ? true : false;
    }

    /**
     * Set value to Session array
     *
     * @param $name
     * @param $value
     */
    public static function set($name, $value) {
        $_SESSION[$name] = $value;
    }

    /**
     * Get value from session array;
     *
     * @param $name
     * @return mixed
     */
    public static function get($name) {
        return $_SESSION[$name];
    }

    /**
     * Unset value from Session array
     *
     * @param $name
     */
    public static function delete($name) {
        if (self::exists($name)) {
            unset($_SESSION[$name]);
        }
    }
}