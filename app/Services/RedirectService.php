<?php
namespace App\Services;

class RedirectService{

    private static $base_uri = 'http://localhost';

    public static function redirect($path, $query = ''){
        $uri = self::$base_uri.$path;
        $url = isset($query) ? "$uri?$query" : $uri;
        header("location:$url");
        exit();

    }
}