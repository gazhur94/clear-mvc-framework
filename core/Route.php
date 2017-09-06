<?php

class Route implements IRoute
{
    /**
     * @var array for routes objects
     */
    private static $_routes = [];

    /**
     * @var array with supported request methods (can be modified)
     */
    protected static $_methods = [
        'get', 'post'
    ];

    /**
     * Set routes from app/Routes.php
     *
     * @param $method Request method
     * @param array $args contains Controller and action names
     * @return Route
     * @throws CoreException
     */
    public static function __callStatic($method, $args)
    {
        /**
         * Check if method exists in $_methods array
         * or
         * throw CoreException
         */
        if (in_array($method, self::$_methods)) {
            if (!isset($args[1]) OR !is_array($args[1])){
                throw new CoreException('Set [\'Controller\' => \'action\'] to route');
            }

            /** Set needed route properties */
            $route = new self;
            $route->url = $args[0];
            $route->method = $method;
            $route->controller = $args[1][0];
            $route->action= $args[1][1];
            $route->values = [];

            /** Put created $route to $_routes array */
            self::$_routes[] = $route;

            return $route;

        } else {
            throw new CoreException($method . ' request method is not available!');
        }
    }

    /**
     * Register new middleware for route
     *
     * @param $middleware
     */
    public function middleware($middleware)
    {
        $this->middlewares[] = $middleware;
    }

    /**
     * Returns routes array with requested request method
     *
     * @param $method
     * @return array
     */
    public static function getRoutes($method)
    {
        return array_filter(self::$_routes, function($route) use ($method) {
            return $route->method === $method;
        });
    }



}