<?php
namespace App\Controller;

error_reporting(E_ALL);
ini_set('display_errors',1);

// use App\Services\LoginService;
use App\Interface\LoginInterface;
// require_once "../Services/LoginService.php";
require_once("../Interface/LoginInterface.php");



class LoginController{
    private $login;

    public function __construct(LoginInterface $login){
        $this->login = $login;
    }

    public function login(){
        $this->login->login();
    }
}