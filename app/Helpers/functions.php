<?php

use Acme\Helpers\Config;

function ddump($var) {
    die(var_dump($var));
}

function dump($var) {
    var_dump($var);
}

function layout($layout) {
    $layout = Config::get('path/layouts') . '/' . $layout . '.layout.php';
    if (!file_exists($layout)) {
        throw new CoreException($layout . ' layout is not found');
    }
    return $layout;
}

function page($page) {
    $page = Config::get('path/pages') . '/' . $page. '.view.php';
    if (!file_exists($page)) {
        throw new CoreException($page . ' page is not found');
    }
    return $page;
}