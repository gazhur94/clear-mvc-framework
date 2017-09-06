<?php

/**
 * Class App
 * @implements IApp
 */
class App implements IApp
{
    /**
     * Start point of the app
     * with global exception handler
     */
    public static function start()
    {
        try {
            new self;
        } catch (CoreException $e) {
            die($e->getMessage());
        }
    }

    /**
     * App constructor
     */
    public function __construct()
    {

        /** Register given routes */
        Boot::script('app/Routes.php');

        /** Finding route for current url */
        $route = RouteHandler::find(Route::getRoutes(Request::method()), Request::url());

        /** Call found controller and middlewares */
        Caller::make($route);
    }
}