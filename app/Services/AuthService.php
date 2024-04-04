<?php
namespace App\Services;

class AuthService{
    
    public static function check($user){

        if(isset($_SESSION[$user])){
            return $_SESSION[$user];
        } else {
            RedirectService::redirect();
        }
    }

    public static function setUser(){
        session_start();
        $_SESSION['user'] ?? $_SESSION['guest'] = TRUE;
    }
}