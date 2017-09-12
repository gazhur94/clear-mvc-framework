<?php
//
//class Response {
//
//    public static $url = null;
//
//    public function redirect()
//    {
////        $this->done = \Acme\Helpers\Redirect::route('home');
//        return $this;
//        //htaccess assign redirect all reqests to url parameter.
////        if (isset($_GET['url'])) {
////            $url = $_GET['url'];
////            self::$url = $url;
////            unset($_GET['url']);
////            return $url;
////        } else if(isset(self::$url)) {
////            return self::$url;
////        } else {
////            return '/';
////        }
//    }
//
//
//    public function message() {
//        \Acme\Helpers\FlashMessage::success('check');
//        return $this;
//    }
//
//    public function __destruct() {
//        \Acme\Helpers\Redirect::route('home');
//    }
//}