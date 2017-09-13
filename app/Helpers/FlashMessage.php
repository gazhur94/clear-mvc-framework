<?php

namespace Acme\Helpers;

class FlashMessage
{
    const FLASH_INDEX = 'FLASH_MESSAGE';

    private static $classes = ['success', 'info', 'warning', 'danger'];

    public static function __callStatic($class, $arguments)
    {
        if (in_array($class, self::$classes) ) {
            self::set(self::html($class, $arguments[0]));
        }
    }

    public static function html($class, $message)
    {
        $html  = '<div class="justify-content-center">';
        $html .= '<div class="alert col-12 text-center alert-' . $class . '" role="alert">';
        $html .= $message;
        $html .= '</div>';
        $html .= '</div>';
        return $html;
    }

    public static function set($message)
    {
        Session::set(self::FLASH_INDEX, $message);
    }

    public static function get()
    {
        if (Session::exists(self::FLASH_INDEX)) {
            $data = Session::get(self::FLASH_INDEX);
            Session::delete(self::FLASH_INDEX);
            return $data;
        }
        return '';
    }
}