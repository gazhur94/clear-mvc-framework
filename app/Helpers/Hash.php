<?php

namespace Acme\Helpers;

class Hash {

    /**
     * Return generated hash from string + salt
     *
     * @param $string
     * @param string $salt
     * @return string
     */
    public static function make($string, $salt = '') {
        return hash('sha256', $string . $salt);
    }

    /**
     * Generate salt with given length
     *
     * @param $length
     * @return string|void
     */
    public static function salt($length) {
        return random_bytes($length);
    }

    /**
     * Generate unique string
     * @return string
     */
    public static function unique() {
        return self::make(uniqid());
    }
}