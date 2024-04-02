<?php
namespace App\Services;

class RedirectService{
    
    private static $base_uri = 'http://localhost';

    public static function redirect($path = null, $prefix= null, $query = null){

        $uri = self::$base_uri.$path;
        
        if(isset($prefix)){
            $uri = "$uri?$prefix";
            if(isset($query)){
                $encode = urlencode($query);
                $uri .= "=$encode";
            }
        }
        header("location: $uri");
        exit();

    }

    public static function back($message = null){
        $last_visit_uri = $_SESSION['last_visit_uri'];
        isset($message) ? self::redirect($last_visit_uri,$message) : self::redirect($last_visit_uri);
    }
}