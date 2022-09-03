<?php
session_start();
use App\Services\App;
use Valitron\Validator;

require_once __DIR__ . '/vendor/autoload.php';
Validator::lang('uk');
App::start();

require_once __DIR__ . '/router/routes.php';


