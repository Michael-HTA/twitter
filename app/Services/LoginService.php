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

        $db = new UsersTable(new MySQL());

        $email = $_POST['email'];
        $password = $_POST['password'];
        
        //email validation
        $email_filter = filter_var($email,FILTER_VALIDATE_EMAIL);

        $user = $db->findByEmailAndPassword($email_filter,$password);

        return "hell world";



    }

    public function logout(){
        return  "logout";
    }

    public function register(){

        $db = new UsersTable(new MySQL());

        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        //validation
        $email_filter = filter_var($email,FILTER_VALIDATE_EMAIL);
        $hash_password = password_hash($password,PASSWORD_DEFAULT);

        $data = [
            "name" => $name,
            "$email" => $email,
            "$password" => $hash_password,
        ];
        
        return $db->storeUser($data);

    }
}

