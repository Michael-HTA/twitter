<?php
namespace App\Services;

error_reporting(E_ALL);
ini_set('display_errors',1);
require_once("../Interface/LoginInterface.php");

use App\Interface\LoginInterface;


class LoginService implements LoginInterface{
    public function login(){
        $email = $_POST['email'];
        $password = $_POST['password'];
        
        $email_filter = filter_var($email,FILTER_VALIDATE_EMAIL);

        echo "$email_filter and $passowrd";

    }

    public function logout(){
        echo "logout";
    }

    public function register(){
        echo "register";
    }
}


$obj = new LoginService();
$obj->login();
$obj->logout();
$obj->register();
