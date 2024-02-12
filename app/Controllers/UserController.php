<?php
namespace App\Controllers;

error_reporting(E_ALL);
ini_set('display_errors',1);

require_once(__DIR__."/../Interface/UserInterface.php");
// use App\Services\LoginService;
use App\Interface\UserInterface;
// require_once "../Services/LoginService.php";



class UserController{
    private $obj;

    public function __construct(UserInterface $obj){
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