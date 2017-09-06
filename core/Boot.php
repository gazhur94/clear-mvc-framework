<?php

class Boot implements IBoot
{
    /**
     * Require php file
     * @param string $path
     */
    public static function script($path) {
        require_once $path;
    }
}