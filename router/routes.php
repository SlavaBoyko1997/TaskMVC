<?php

use App\Services\Router;
use App\Controllers\Auth;
use App\Controllers\Post;

Router::page('/','home');
Router::page('/login','login');
Router::page('/register','register');

Router::post('/auth/register', Auth::class, 'register');
Router::post('/auth/login', Auth::class, 'login');
Router::post('/auth/logout', Auth::class, 'logout');
Router::post('/post', Post::class, 'save');

Router::enable();