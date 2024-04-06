<?php
namespace App\Database\Tables;

// require_once __DIR__."/../Interface/DatabaseInterface.php";

// include_once(__DIR__."/../../vendor/autoload.php");
use App\Interface\DatabaseInterface;
use PDOException;

/**
 * findByEmailAndPassword   R
 * storeUser                C
 * updateUser               U
 */
class UsersTable extends Table{
    private $db;

    public function __construct(DatabaseInterface $mysql)
    {
        $this->db = $mysql->connect();
    }

    public function findByEmailAndPassword($email,$password){

        $statement = $this->db->prepare("SELECT * FROM users WHERE email=:email");
        $statement->execute(["email" => $email]);

        $user = $statement->fetch();
       
        if($user){
            if(password_verify($password, $user->password)){
                return $user;
            }
        } else {
            return false;
        }
    }

    public function storeUser($data){
        try{    
            $query = "INSERT INTO users (first_name,last_name,email,password) VALUES (:first_name,:last_name,:email,:password);";

            $statement = $this->db->prepare($query);

            $result = parent::storeOrUpdate($this->db,$statement,$data);
        
            return $result;
        } catch( PDOException $e){
                if($e->getMessage()){
                    return false;
                }
            }
    }               

    public function updateUser($data){

        try{
            $query = "UPDATE users set first_name = :first_name,
                                    last_name = :last_name,
                                    email = :email,
                                    password = :password
                                    WHERE id = :id";
        
            $statement = $this->db->prepare($query);

            $result = parent::storeOrUpdate($this->db,$statement,$data);

            return $result;
        } catch( PDOException $e){
            if($e->getMessage()){
                return false;
            }
        }
    }
}