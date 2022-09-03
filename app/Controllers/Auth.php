<?php

namespace App\Controllers;

use App\Services\Router;
use Valitron\Validator;

class Auth
{

    public function login($data)
    {

        $email = $data['email'];
        $password = $data['password'];


        $user = \R::findOne('users','email = ?',[$email]);

        if (!$user) {
            $_SESSION['error'] = 'Непаравильний Email або пароль';
            $_SESSION['email_old'] = $data['email'];
            Router::redirect('/login');
        }

        if (password_verify($password, $user->password)) {
            session_start();
            $_SESSION['user'] = [
                'id' => $user->id,
                'email' => $user->email,
                'position' => $user->position,

                Router::redirect('/')
            ];
        }else{
            $_SESSION['error'] = 'Непаравильний Email або пароль';
            $_SESSION['email_old'] = $data['email'];
            Router::redirect('/login');
        }
    }
    
    
    public function register($data)
    {
        $validate_rules = require_once 'config/validate_rules.php';
        $v = new Validator($data);
        $v->rules($validate_rules);
        $v->labels(['password'=>'Пароль']);

        $user = \R::findOne('users','email = ?',[$data['email']]);

        if ($user){
            $_SESSION['error'] = 'Email вже зайнятий';
            $_SESSION['email_old'] = $data['email'];
            Router::redirect('/register');
        }else{
            if ($v->validate()){


                if ($data['password'] !== $data['confirm_password']) {
                    Router::not_found_page();
                    die();
                }

                $user = \R::dispense('users');
                $user->email = $data['email'];
                $user->position = $data['position'];
                $user->password = password_hash($data['password'],PASSWORD_DEFAULT);
                \R::store($user);
                $_SESSION['success'] = 'Користуваа стоворено!!!';
                Router::redirect('/login');
            }else{
                $_SESSION['errors'] = $v->errors();
                $_SESSION['email_old'] = $data['email'];
                Router::redirect('/register');
            }
        }


    }

    public static function logout()
    {
        unset($_SESSION['user']);
        Router::redirect('/login');
    }
}