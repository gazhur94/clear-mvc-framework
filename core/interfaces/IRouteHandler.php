<?php

interface IRouteHandler
{
    /**
     * Finding route object for given url
     *
     * @param array $routes Array with routes
     * @param $url Just url
     * @return $route found object
     */
    public static function find($routes, $url);
}