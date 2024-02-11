<?php
namespace App\Controllers;

error_reporting(E_ALL);
ini_set('display_errors',1);

require_once(__DIR__."/../Interface/LoginInterface.php");
// use App\Services\LoginService;
use App\Interface\LoginInterface;
// require_once "../Services/LoginService.php";



class LoginController{
    private $login;

    public function __construct(LoginInterface $obj){
        $this->login = $obj;
    }

    public function login(){
        $this->login->login();
    }
}