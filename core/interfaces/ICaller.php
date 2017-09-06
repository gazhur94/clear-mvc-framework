<?php

interface ICaller {
    /**
     * Making call of all functions for current route
     * @param $route
     */
    public static function make($route);
}