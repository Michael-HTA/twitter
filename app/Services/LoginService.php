<?php
namespace App\Services;

error_reporting(E_ALL);
ini_set('display_errors',1);
require_once __DIR__."/../Interface/LoginInterface.php";
require_once __DIR__."/../Database/MySQL.php";
require_once __DIR__."/../Database/UsersTable.php";

use App\Interface\LoginInterface;
use Database\UsersTable;
use Database\MySQL;


class LoginService implements LoginInterface{

    public function login(){
        $db = new UsersTable(new MySQL);

        $email = $_POST['email'];
        $password = $_POST['password'];
        
        //email validation
        $email_filter = filter_var($email,FILTER_VALIDATE_EMAIL);

        $user = $db->findByEmailAndPassword($email_filter,$password);

        if($user){
            return "hello world";
        }else{
            return "NO No No";
        }



    }

    public function logout(){
        echo "logout";
    }

    public function register(){
        echo "register";
    }
}

