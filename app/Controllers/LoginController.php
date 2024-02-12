<?php
namespace App\Controllers;

error_reporting(E_ALL);
ini_set('display_errors',1);

require_once(__DIR__."/../Interface/LoginInterface.php");
// use App\Services\LoginService;
use App\Interface\LoginInterface;
// require_once "../Services/LoginService.php";



class LoginController{
    private $obj;

    public function __construct(LoginInterface $obj){
        $this->obj = $obj;
    }

    public function login(){
        return $this->obj->login();
    }

    public function register(){
        return $this->obj->register();
    }

    public function logout(){
        return $this->obj->logout();
    }
}