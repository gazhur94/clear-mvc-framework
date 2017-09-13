<?php

namespace Acme\Middlewares;

use Acme\Database\QueryBuilder;
use Acme\Helpers\Cookie;
use Acme\Helpers\Config;
use Acme\Views\View;
use Acme\Helpers\Session;
use Acme\Models\User;

class MainMiddleware
{
    public function before()
    {
        Session::start();
        $this->assignTitle();
        $this->saveUrl();
        $this->checkCookieToken();
        $this->isLoggedInFilter();
    }

    public function after()
    {
        //logging, caching, etc.
    }

    private function assignTitle()
    {
        //app name
        View::assign(['appName' => Config::get('APP_NAME')]);

        //title
        $route = \RouteHandler::getRouteBy('url', \Request::url());
        $title = $route->title['en'] ?? Config::get('DEFAULT_TITLE');
        View::assign(['title' => $title]);
    }

    private function saveUrl()
    {
        //saveUrl
        if (Session::exists('CURRENT_PAGE') && $_SERVER['REQUEST_URI'] !== Session::get('CURRENT_PAGE')) {
            $temp = Session::get('CURRENT_PAGE');
        } else {
            $temp = '/';
        }
        Session::set('PREVIOUS_PAGE', $temp);
        Session::set('CURRENT_PAGE', $_SERVER['REQUEST_URI']);
    }

    private function checkCookieToken()
    {
        //check cookie auth
        if (Cookie::exists('AUTH') && !Session::exists('user')) {
            $sessionFromCookie = Cookie::get('AUTH');
            $userId = (new QueryBuilder)->table('users_sessions')->where(['session' => $sessionFromCookie])->select()[0]->id;

            if ($userId) {
                Session::set('user', (new User)->getUserById($userId));
            }
        }
    }

    private function isLoggedInFilter()
    {
        //LogIn Filter
        $isLoggedIn = Session::exists('user');
        View::assign(['isLoggedIn' => $isLoggedIn]);
        if ($isLoggedIn) {
            View::assign(['username' => Session::get('user')->username]);
        }
    }
}