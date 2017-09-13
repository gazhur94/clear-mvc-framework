<?php

namespace Acme\Helpers;

class FlashMessage
{
    /**
     * Key of message in $_SESSION array
     */
    const FLASH_INDEX = 'FLASH_MESSAGE';

    /**
     * Bootstrap 4 alert classes
     * @var array
     */
    private static $classes = ['success', 'info', 'warning', 'danger'];

    /**
     * Set flash message to session
     * Call it like FlashMessage::success
     *
     * @param $class
     * @param $arguments
     * @throws \CoreException
     */
    public static function __callStatic($class, $arguments)
    {
        if (in_array($class, self::$classes) ) {
            return self::set(self::html($class, $arguments[0]));
        }
        throw new \CoreException($class . ' class is not available');
    }

    /**
     * Construct html code with message
     *
     * @param $class
     * @param $message
     * @return string
     */
    public static function html($class, $message)
    {
        $html  = '<div class="justify-content-center">';
        $html .= '<div class="alert col-12 text-center alert-' . $class . '" role="alert">';
        $html .= $message;
        $html .= '</div>';
        $html .= '</div>';
        return $html;
    }

    /**
     * Set message to session
     *
     * @param $message
     */
    public static function set($message)
    {
        Session::set(self::FLASH_INDEX, $message);
    }

    /**
     * Get message from session then delete one;
     *
     * @return mixed|string
     */
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