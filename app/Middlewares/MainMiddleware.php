<?php

namespace Acme\Middlewares;

use Acme\Database\QueryBuilder;
use Acme\Helpers\Cookie;
use Acme\Views\View;
use Acme\Helpers\Session;
use Acme\Models\User;

class MainMiddleware
{
    public function before()
    {
        Session::start();

        //saveUrl
        if (Session::exists('CURRENT_PAGE') && $_SERVER['REQUEST_URI'] !== Session::get('CURRENT_PAGE')) {
            $temp = Session::get('CURRENT_PAGE');
        } else {
            $temp = '/';
        }
        Session::set('PREVIOUS_PAGE', $temp);
        Session::set('CURRENT_PAGE', $_SERVER['REQUEST_URI']);


        //check cookie auth
        if (Cookie::exists('AUTH') && !Session::exists('user')) {
            $sessionFromCookie = Cookie::get('AUTH');
            $userId = (new QueryBuilder)->table('users_sessions')->where(['session' => $sessionFromCookie])->select()[0]->id;

            if ($userId) {
                Session::set('user', (new User)->getUserById($userId));
            }
        }

        //LogIn Filter
        $isLoggedIn = Session::exists('user');
        View::assign(['isLoggedIn' => $isLoggedIn]);
        if ($isLoggedIn) {
            View::assign(['username' => Session::get('user')->username]);
        }

    }

    public function after()
    {
        //logging, caching, etc.
    }
}