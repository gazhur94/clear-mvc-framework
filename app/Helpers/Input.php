<?php

namespace Acme\Helpers;

class Input {

    /**
     * Return value of given input field
     * Call like Input::fieldname()
     *
     * @param $name
     * @param $arguments
     * @return string
     */
    public static function __callStatic($name, $arguments)
    {
        if (isset($_POST[$name])) {
            if (isset($arguments[0]) && $arguments[0] === false) {
                return $_POST[$name];
            }
            return self::escape($_POST[$name]);
        }
    }

    /**
     * Escape input filtering
     * @param $data
     * @return string
     */
    public static function escape($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    /**
     * Return all input data
     *
     * @return array
     */
    public static function all()
    {
        return array_merge($_POST, $_GET);
    }

    /**
     * Return input field with GET method
     *
     * @param $item
     * @param bool $escape
     * @return null|string
     */
    public static function get($item, $escape = false) {
        if(isset($_GET[$item]) && $escape) {
            return self::escape($_GET[$item]);
        } else if (isset($_POST[$item])) {
            return $_GET[$item];
        }
        return null;
    }
}