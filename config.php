<?php

define('DEVELOP_MODE', true);

$GLOBALS['config'] = [
    'APP_NAME' => 'Project name',
    'DEFAULT_TITLE' => 'Home page',

    'database' => [
        'DB_TYPE' => 'mysql',
        'DB_NAME' => 'slim',
        'DB_HOST' => '127.0.0.1',
        'username' => 'root',
        'password' => ''
    ],
    'path' => [
        'layouts' =>  'app/Views/layouts/',
        'pages' =>  'app/Views/pages/',
        'assets' => '/public/assets/'
    ],
];
