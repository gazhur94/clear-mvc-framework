<?php

/**
 * Only developing stage settings!
 * Must be deleted after release.
 */
ini_set('display_errors', 1);
error_reporting(E_ALL);

/**
 * Main settings
 */

$GLOBALS['config'] = [
    'database' => [
        'DB_TYPE' => 'mysql',
        'DB_NAME' => 'my-blog',
        'DB_HOST' => '127.0.0.1',
        'username' => 'root',
        'password' => ''
    ],
    'cookie' => [

    ],
    'session' => [

    ],
    'path' => [
        'root' => __DIR__,
        'views' => __DIR__ . '/app/Views/',
        'layouts' => __DIR__ . '/app/Views/layouts',
        'pages' => __DIR__ . '/app/Views/pages',
    ],
];
