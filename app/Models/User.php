<?php

namespace Acme\Models;

use Acme\Helpers\Hash;
use Acme\Helpers\Session;
use Acme\Helpers\Cookie;

class User extends Model
{
//    public $table = 'demons';

    public static $rules = [
        'username' => 'required|min:4|max:32|username|unique:users',
        'email' => 'required|min:5|max:64|email|unique:users',
        'password' => 'required|min:5|max:150',
        'repassword' => 'required|match:password',
        'login' => 'required|min:4|max:32|username'
    ];

    public function signUp($username, $email, $password) {

        $salt = Hash::salt(32);

        $hashedPassword = Hash::make($password, $salt);

        $data = [
            'username' => strtolower($username),
            'email' => strtolower($email),
            'password' => $hashedPassword,
            'salt' => $salt
        ];

        return $this->insert($data);
    }

    public function signIn($username, $password, $remember = false)
    {
        if ($this->attempt($username, $password)) {
            if ($remember) {
                $this->remember();
            }
            return true;
        }
        return false;
    }

    public function attempt($username, $password)
    {
        $user = $this->where(['username' => $username])->select()[0];

        if ($user && Hash::make($password, $user->salt) === $user->password) {
            Session::set('user', $user);
            return true;
        }
        return false;
    }

    public function signOut()
    {
        if (Cookie::exists('AUTH')) {
            $this->table('users_sessions')->where(['user_id' => $this->data('id')])->delete();
            Cookie::delete('AUTH');
        }
        Session::delete('user');
    }

    public function data($field = null)
    {
        if (Session::exists('user')) {
            $data = Session::get('user');
            if ($field) {
                $data = $data->{$field};
            }
            return $data;
        }
        return null;
    }

    public function remember()
    {
        $session = Hash::unique();

        $this->table('users_sessions')->insert([
            'user_id' => $this->data('id'),
            'session' => $session
        ]);

        Cookie::set('AUTH', $session, 60*60*24*30);
    }

    public function getUserById($id)
    {
        return $this->where(['id' => $id])->select()[0];
    }
}