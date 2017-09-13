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
        /** Logic that need only on develop stage */
        if (DEVELOP_MODE) {
            ini_set('display_errors', 1);
            error_reporting(E_ALL);
            Acme\Database\Connection::get();
        }

        /** Register given routes */
        Boot::script('app/Routes.php');

        /** Finding route for current url */
        $route = RouteHandler::find(Route::getRoutes(Request::method()), Request::url());

        /** Call found controller and middlewares */
        Caller::make($route);
    }
}