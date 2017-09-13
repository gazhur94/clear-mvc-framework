<?php

namespace Acme\Views;

class View
{
    /**
     * Data that will be displayed in view page
     *
     * @var $data
     */
    private static $data;

    /**
     * Render view page with layout and data
     *
     * @param $layout
     * @param $page
     * @param null $data
     * @return bool
     */
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

    /**
     * Assign data to view
     * @param $data
     */
    public static function assign($data)
    {
        foreach($data as $key => $value) {
            self::$data[$key] = $value;
        }
    }

}