<?php

/**
 * Call all registered functions for given route
 * Class Caller
 */
class Caller implements ICaller {
    /**
     * @param instance of Route $route
     * @throws CoreException
     */
    public static function make($route)
    {
        /** For wrong url throw 404 error */
        if (!$route) {
            //response with header 404
            die('404!');
        }

        /** Check if Controller file exists */
        $controllerClass = 'Acme\\Controllers\\' . $route->controller;

        if (!class_exists($controllerClass)) {
            throw new CoreException('Controller not found!');
        }

        $controller = new $controllerClass(new Acme\Views\View);

        /** Check if action of the controller exists */
        if (!method_exists($controller, $route->action)) {
            throw new CoreException('Action is not found in ' . $route->controller);
        }

        /** filtering before action */
        self::middlewaring($route->middlewares, 'before');
        /** Call controller action with given parameters */
        call_user_func_array([$controller, $route->action], $route->values);
        /** filtering after action */
        self::middlewaring($route->middlewares, 'after');

    }
    /**
     * Looping through registered middlewares for route
     * and call it before/after controller
     *
     * @param $middlewares
     * @param $event
     * @throws CoreException
     */
    public static function middlewaring($middlewares, $event)
    {
        foreach($middlewares as $mw) {
            $mwClass = 'Acme\\Middlewares\\' . ucfirst($mw) . 'Middleware';
            if (!class_exists($mwClass)) {
                throw new CoreException($mwClass . ' middleware is not registered!');
            }
            call_user_func([new $mwClass, $event]);
        }
    }
}