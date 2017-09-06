<?php

namespace Acme\Helpers;

class Config
{
    public static function get($path = null)
    {
        $config = $GLOBALS['config'];
        $path = explode('/', $path);

        foreach ($path as $bit) {
            if (isset($config[$bit])) {
                $config = $config[$bit];
            }
        }
        return $config;
    }
}