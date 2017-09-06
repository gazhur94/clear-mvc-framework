<?php

interface IRoute {
    /**
     * Setting up request method for route
     *
     * @param $method
     * @param $args
     * @return $this object
     */
    public static function __callStatic($method, $args);

    /**
     * @param $method
     * @return array with routes for current request method
     */
    public static function getRoutes($method);

    /**
     * Register middleware to route
     * @param $name ClassName of middleware
     * @return mixed
     */
    public function middleware($name);
}