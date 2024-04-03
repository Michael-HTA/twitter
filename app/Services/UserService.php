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

        $email = isset($_POST['email']) ? trim($_POST['email']): $_SESSION['email'];
        $password = isset($_POST['password']) ? trim($_POST['password']): $_SESSION['password'];
        
        //email validation
        $filtered_email = filter_var($email,FILTER_VALIDATE_EMAIL);
        
        //if email validation
        if($filtered_email === false) return false;

        //authenticating the user
        $user = $this->db->findByEmailAndPassword($filtered_email,$password);
        // var_dump($user);
        // die();
        // return data related to user if user is authenticated
        if($user !== false){
            unset($_SESSION['guest']);
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $password;
            $_SESSION['user'] = $user->first_name;
            return $user;
        } else {
            return false;
        }
    }

    public function logout(){
        unset($_SESSION['user']);
        unset($_SESSION['email']);
        unset($_SESSION['password']);
        unset($_SESSION['last_visit_uri']);
        session_destroy();
        http_response_code(200);
        return TRUE;
    }

    public function register(){


        $first_name = trim($_POST["first_name"]);
        $last_name = trim($_POST["last_name"]);
        $email = trim($_POST["email"]);
        $password = trim($_POST["password"]);

        //validation
        $filtered_email = filter_var($email,FILTER_VALIDATE_EMAIL);

        //if email validation
        if($filtered_email === false) return false;

        $hash_password = password_hash($password,PASSWORD_DEFAULT);


        $data = [
            "first_name" => $first_name,
            "last_name" => $last_name,
            "email" => $filtered_email,
            "password" => $hash_password,
        ];

        //storing data
        $result = $this->db->storeUser($data);
        // if storing data fail reutrn false
        return  $result !== false ? $result : false;

    }
}

