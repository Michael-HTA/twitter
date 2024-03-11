<?php
namespace App\Services;

error_reporting(E_ALL);
ini_set('display_errors',1);

// include_once(__DIR__."/../../vendor/autoload.php");
// require_once __DIR__."/../Interface/UserInterface.php";
// require_once __DIR__."/../Database/MySQL.php";
// require_once __DIR__."/../Database/SQLite.php";
// require_once __DIR__."/../Database/UsersTable.php";

use App\Interface\UserInterface;
use App\Database\UsersTable;
use App\Database\MySQL;
use App\Database\SQLite;

class UserService implements UserInterface{

    private $db;

    public function __construct()
    {
        // $db = new UsersTable(new MySQL());
        $this->db = new UsersTable(new SQLite());
    }

    public function login(){

        $email = $_POST['email'];
        $password = $_POST['password'];
        
        //email validation
        $filtered_email = filter_var($email,FILTER_VALIDATE_EMAIL);
        $user = $this->db->findByEmailAndPassword($filtered_email,$password);
        
        return $user;



    }

    public function logout(){
        
        return  "logout";
    }

    public function register(){


        $name = $_POST["name"];
        $email = $_POST["email"];
        $password = $_POST["password"];

        //validation
        $filtered_email = filter_var($email,FILTER_VALIDATE_EMAIL);
        $hash_password = password_hash($password,PASSWORD_DEFAULT);

        $data = [
            "name" => $name,
            "email" => $filtered_email,
            "password" => $hash_password,
        ];
        
        return $this->db->storeUser($data);

    }
}

