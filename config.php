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

define('ROOT_DIRECTORY', '');

$GLOBALS['config'] = [
    'database' => [
        'DB_TYPE' => 'mysql',
        'DB_NAME' => 'slim',
        'DB_HOST' => '127.0.0.1',
        'username' => 'root',
        'password' => ''
    ],
    'path' => [
        'root' => ROOT_DIRECTORY,
        'layouts' => ROOT_DIRECTORY . 'app/Views/layouts/',
        'pages' => ROOT_DIRECTORY . 'app/Views/pages/',
        'assets' => ROOT_DIRECTORY . '/public/assets/'
    ],
    ''
];
