<?php
namespace Database;

require_once __DIR__."/../Interface/DatabaseInterface.php";
use App\Interface\DatabaseInterface;

class UsersTable{
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

        // return $this->db;
        $query = "INSERT INTO users (name,email,password) VALUES (:name,:email,:password)";
        $statement = $this->db->prepare($query);
        $statement->execute($data);
        return $this->db->lastInsertId();
    }


}