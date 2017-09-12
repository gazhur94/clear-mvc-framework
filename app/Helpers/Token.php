<?php

namespace Acme\Helpers;

class Token {

    public static function generate($name) {
        $token= Hash::unique();
        Session::set($name, $token);
        return $token;
    }

    public static function check($name, $token) {
        if (Session::exists($name) && $token === Session::get($name)) {
            Session::delete($name);
            return true;
        }
        return false;
    }
}