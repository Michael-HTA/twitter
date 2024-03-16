<?php
namespace App\Services;

class RedirectService{

    private static $base_uri = 'http://localhost';

    public static function redirect($path = null, $prefix= null, $query = null ){

        $uri = self::$base_uri.$path;
        if(isset($query) && isset($prefix)){
            $encode = urlencode($query);
            $uri = "$uri?$prefix=$encode";
        }
        header("location: $uri");
        exit();

    }
}