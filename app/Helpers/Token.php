<?php

namespace Acme\Helpers;

class Token {

    /**
     * Generate token and set it to Session array
     *
     * @param $name
     * @return string
     */
    public static function generate($name) {
        $token= Hash::unique();
        Session::set($name, $token);
        return $token;
    }

    /**
     * Compare token with saved in Session one
     *
     * @param $name
     * @param $token
     * @return bool
     */
    public static function check($name, $token) {
        if (Session::exists($name) && $token === Session::get($name)) {
            Session::delete($name);
            return true;
        }
        return false;
    }
}