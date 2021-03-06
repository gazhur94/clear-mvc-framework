<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit9c275326b69e3246c4884532fa8e6882
{
    public static $files = array (
        '6fe2ccb2918708768ccab6a48c647b8b' => __DIR__ . '/../..' . '/app/Helpers/functions.php',
    );

    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'Acme\\' => 5,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Acme\\' => 
        array (
            0 => __DIR__ . '/../..' . '/app',
        ),
    );

    public static $classMap = array (
        'App' => __DIR__ . '/../..' . '/core/App.php',
        'Boot' => __DIR__ . '/../..' . '/core/Boot.php',
        'Caller' => __DIR__ . '/../..' . '/core/Caller.php',
        'CoreException' => __DIR__ . '/../..' . '/core/exceptions/CoreException.php',
        'IApp' => __DIR__ . '/../..' . '/core/interfaces/IApp.php',
        'IBoot' => __DIR__ . '/../..' . '/core/interfaces/IBoot.php',
        'ICaller' => __DIR__ . '/../..' . '/core/interfaces/ICaller.php',
        'IRoute' => __DIR__ . '/../..' . '/core/interfaces/IRoute.php',
        'IRouteHandler' => __DIR__ . '/../..' . '/core/interfaces/IRouteHandler.php',
        'Request' => __DIR__ . '/../..' . '/core/Request.php',
        'Route' => __DIR__ . '/../..' . '/core/Route.php',
        'RouteHandler' => __DIR__ . '/../..' . '/core/RouteHandler.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit9c275326b69e3246c4884532fa8e6882::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit9c275326b69e3246c4884532fa8e6882::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit9c275326b69e3246c4884532fa8e6882::$classMap;

        }, null, ClassLoader::class);
    }
}
