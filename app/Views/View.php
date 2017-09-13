<?php

namespace Acme\Views;

class View
{
    private static $data;

    public function render($layout, $page, $data = null) {

        if (is_array($data)) {
            self::assign($data);
        }

        if (self::$data) {
            extract(self::$data);
        }

        $page = view('page', $page);

        $layout = view('layout', $layout);

        require_once $layout;

        return true;

    }

    public static function assign($data)
    {
        foreach($data as $key => $value) {
            self::$data[$key] = $value;
        }
    }

}