<?php

/**
 * Class RouteHandler
 */
class RouteHandler implements IRouteHandler
{

    /**
     * @param array $routes
     * @param $url
     * @return bool
     * @throws CoreException
     */
    public static function find($routes, $url)
    {
        if (!empty($routes)) {
            /** Looping through every $routes */
            foreach($routes as $route) {

                /** Check if route contains variables like 'id/{userId}' */
                if (preg_match_all('/{[a-zA-Z]{1,}}/', $route->url, $vars)) {
                    /** @var parsing url */
                    $route->url = preg_replace('/{[a-zA-Z]{1,}}/', '([a-zA-Z0-9]{1,})', $route->url);
                    /** Searching needed $route object */
                    if (preg_match('~' . $route->url . '~', $url, $values))
                    {
                        $vars = array_map(function($match) {return trim($match, "{}");}, $vars[0]);
                        array_shift($values);
                        /** Asset url values to route object  */
                        $route->values[] = array_combine($vars, $values);

                        return $route;
                    }
                }

                if ($route->url === $url) {
                    return $route;
                }
            }
            /** If route not found return false */
            return false;

        } else {
            throw new CoreException('Not any route registered for this request method!');
        }
    }

    /**
     * Return route by property and his value
     *
     * @param $param
     * @param $value
     * @return object of Route
     * @throws CoreException
     */
    public static function getRouteBy($param ,$value)
    {
        $routes = Route::getRoutes();
        foreach($routes as $route) {
            if ($route->{$param} === $value) {
                return $route;
            }
        }
        throw new CoreException('Not found any route with ' . $param . ': ' . $value);
    }
}