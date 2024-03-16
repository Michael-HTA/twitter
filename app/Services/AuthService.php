<?php
namespace App\Services;

class AuthService{
    public static function check($user){

        // session_start();

        if(isset($_SESSION[$user])){
            return $_SESSION[$user];
        } else {
            RedirectService::redirect();
        }
    }

    public static function setUser(){
        
    }
}