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
use App\Database\Tables\UsersTable;
use App\Database\Drivers\MySQL;
use App\Database\Drivers\SQLite;

/**
 * login        R
 * logout       R
 * register     C
 * update       U
 */

class UserService implements UserInterface{

    private $db;

    public function __construct()
    {
        // $this->db = new UsersTable(new MySQL());
        $this->db = new UsersTable(new MySQL());
    }

    public function login(){

        /**
         * need to install the mb_string package
         */
        $email = isset($_POST['email']) ? trim(mb_strtolower($_POST['email'], 'UTF-8')): $_SESSION['email'];
        $password = isset($_POST['password']) ? trim($_POST['password']): $_SESSION['password'];
        
        //email validation
        $sanitize_email = filter_var($email,FILTER_SANITIZE_EMAIL);
        $filtered_email = filter_var($sanitize_email,FILTER_VALIDATE_EMAIL);
        
        //if email validation
        if($filtered_email === false || empty($email) || empty($password) || $sanitize_email !== $filtered_email || strlen($password) < 8){
            return false;
        }

        //authenticating the user
        $user = $this->db->findByEmailAndPassword($filtered_email,$password);
       
        // return data related to user if user is authenticated
        if($user !== false){
            session_regenerate_id();
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
        return TRUE;
    }

    public function register(?bool $updateTheEmail = true, ?bool $updateThePassword = true){

        //name
        $first_name = isset($_POST["first_name"]) ? trim($_POST["first_name"]) : '';
        $last_name = isset($_POST["last_name"]) ? trim($_POST["last_name"]) : '';

        //email validation
        if($updateTheEmail){
            $email = isset($_POST["email"]) ? trim(mb_strtolower($_POST["email"], 'UTF-8')) : '';
        } else {
            $email = isset($_SESSION['email']) && !$updateTheEmail ? $_SESSION['email'] : '';
        }

        //password validation
        if($updateThePassword){
            $password = isset($_POST["password"]) ? trim($_POST["password"]) : '';
        } else {
            $password = isset($_SESSION['password']) ? $_SESSION['password'] : '';
        }

        //validation
        $sanitize_email = filter_var($email,FILTER_SANITIZE_EMAIL);
        $filtered_email = filter_var($sanitize_email,FILTER_VALIDATE_EMAIL);

        //if email validation
        if($filtered_email === false || empty($first_name) || empty($last_name) || empty($password) || strlen($password) < 8 || $sanitize_email !== $filtered_email){ 
            return false;
        }

        $hash_password = password_hash($password,PASSWORD_DEFAULT);


        if($updateTheEmail && $updateThePassword){

            $data = [
                "first_name" => $first_name,
                "last_name" => $last_name,
                "email" => $filtered_email,
                "password" => $hash_password,
            ];
            
            //storing or updating data
            $result = $this->db->storeUser($data);

        } else {

            //timestamp
            $updated_at = date('m-d-Y H:i:s',time());

            $data = [
                "first_name" => $first_name,
                "last_name" => $last_name,
                "email" => $filtered_email,
                "password" => $hash_password,
                "updated_at" => $updated_at,
            ];
          
            //storing or updating data
            $result = $this->db->updateUser($data);
        }

        // if storing data fail reutrn false
        if($result !== false){
            //security purpose
            session_regenerate_id();
            return $result;
        } else {
            return false;
        }

    }

    //update user info
    public function update(){

        return $this->register(updateTheEmail:false,updateThePassword:true);
    }

    public function search(){
            
        $search = isset($_GET["search"])? $_GET["search"] : '';
        return $this->db->search($search);

    }

    public function updateProfile($photo,$id){
        return $this->db->updateProfile(['photo'=>$photo, 'id'=>$id]);
    }
}

