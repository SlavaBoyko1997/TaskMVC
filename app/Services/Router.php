<?php

namespace App\Services;

class Router
{
    private static $list = [];


    public static function page($uri, $page_name)
    {
        self::$list[] = [
            "uri" => $uri,
            "page" => $page_name,
        ];
    }


    public static function post($uri , $class, $method)
    {
        self::$list[] = [
            "uri" => $uri,
            "class" => $class,
            "method" => $method,
            "post" => true,
        ];
    }


    public static function enable()
    {
        $query = $_GET['q'];


        foreach (self::$list as $route) {
                if ($route['uri'] === '/' . $query) {
                    if ($route['post'] === true AND $_SERVER['REQUEST_METHOD'] === 'POST') {
                        $action = new $route['class'];
                        $method = $route['method'];
                        $action->$method($_POST);
                        die();
                    }else{
                        require_once "views/pages/" . $route['page'] . ".php";
                        die();
                    }
                }


        }

       self::not_found_page();
    }


    public static function not_found_page()
    {
        require_once "views/errors/404.php";
    }

    public static function redirect($uri)
    {
       header('location:'.$uri);
    }
    
}