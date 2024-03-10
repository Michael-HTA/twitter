<?php
namespace App\Services;

class AuthService{
    public function check($user){
        session_start();
        if(isset($_SESSION['user'])){
            return $_SESSION['user'];
        } else{
            
        }
    }
}