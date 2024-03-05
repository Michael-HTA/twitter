<?php
namespace App\Controllers;

error_reporting(E_ALL);
ini_set('display_errors',1);


// require_once(__DIR__."/../Interface/UserInterface.php");
// use App\Services\LoginService;
// require_once "../Services/LoginService.php";


// include_once(__DIR__."/../../vendor/autoload.php");
use App\Interface\UserInterface;
use App\Services\UserService;


class UserController{
    private $obj;

    public function __construct(){
        $this->obj = new UserService;
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