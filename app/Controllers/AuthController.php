<?php

namespace Acme\Controllers;

use Acme\Helpers\FlashMessage;
use Acme\Models\User;
use Acme\Helpers\Input;
use Acme\Validation\Validator;
use Acme\Helpers\Redirect;

class AuthController extends Controller
{
    public function postSignIn()
    {
        //middleware GUEST

        $v = new Validator(Input::all(), User::rules());

        if ($v->errors()) {
            return $this->view->render('main', 'auth/login', ['errors' => $v->errors()]);
        }

        if (!(new User)->signIn(Input::login(), Input::password(), Input::remember()) ) {
            $errors['attempt'] = 'Wrong username or password!';
            return $this->view->render('main', 'auth/login', ["errors" => $errors]);
        }

        return Redirect::route('home');
    }


    public function getSignIn()
    {
        $this->view->render('main', 'auth/login');
    }

    public function postSignUp()
    {
        //middleware CSRF
        //middleware GUEST

        $v = new Validator(Input::all(), User::rules());

        if ($v->errors()) {
            return $this->view->render('main', 'auth/register', [
                'errors' => $v->errors()
            ]);
        }

        if (!(new User)->singUp(Input::username(), Input::email(), Input::password())) {
            FlashMessage::danger('Ooops. Something goes wrong! Try to register again!');
            return Redirect::route('home');
        }

        FlashMessage::success('You successfully registered! Now you can log in');
        return Redirect::route('home');

//      $this->response->redirect('home')->message('You successfully registered! Now you can log in')->data(['test' => 'check']);
    }

    public function getSignUp()
    {
        $this->view->render('main', 'auth/register');
    }

    public function getSignOut()
    {
        (new User)->signOut();
        FlashMessage::success('You successfully logged out!');
        return Redirect::back();
    }
}