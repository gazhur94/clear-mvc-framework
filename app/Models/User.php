<?php

namespace Acme\Models;

use Acme\Helpers\Hash;
use Acme\Helpers\Session;

class User extends Model
{
//    public $table = 'demons';

    public static $rules = [
        'username' => 'required|min:4|max:32|username|unique:users',
        'email' => 'required|min:5|max:32|email|unique:users',
        'password' => 'required|min:5|max:150',
        'repassword' => 'required|match:password',
        'login' => 'required|min:4|max:32|username'
    ];

    public function register($username, $email, $password) {

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

    public function login($username, $password, $remember)
    {
        if ($this->attempt($username, $password)) {
            return true;
        }
        return false;
    }

    public function attempt($username, $password)
    {
        $user = $this->where(['username' => $username])->select()->first();

        if ($user && Hash::make($password, $user->salt) === $password) {
            Session::set('user', $user);
            return true;
        }
        return false;
    }
}