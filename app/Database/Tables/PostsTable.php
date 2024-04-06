<?php
namespace App\Database\Tables;

use App\Interface\DatabaseInterface;
use PDOException;

class PostsTable extends Table{
    private $db;

    public function __construct(DatabaseInterface $mysql)
    {
        $this->db = $mysql->connect();
    }

    public function getAllPost(){

        try{

            $query = "SELECT CONCAT(users.first_name, ' ', users.last_name) AS name, posts.* FROM posts INNER JOIN users ON users.id = posts.user_id";

            $statement = $this->db->prepare($query);
    
    
            $statement->execute();
            return $statement->fetchall();

        } catch (PDOException $e){

        if($e->getMessage()){
            return false;
        }
       }

    }

    //for profile page 
    public function getUserPost(array $id){
        try{
            
            $query = "SELECT * FROM posts WHERE posts.user_id = :id ";

            $statement = $this->db->prepare($query);
            $statement->execute($id);
            return $statement->fetchall();

        } catch(PDOException $e){
            if($e->getMessage()){
                return false;
            }
        }

    }

    public function storeUserPost(array $data){

        $query = "INSERT INTO posts (body,user_id) VALUES (:body,:user_id)";

        $statement = $this->db->prepare($query);

        $result = parent::storeOrUpdate($this->db,$statement,$data);

        return $result;
    }

    public function updateUserPost(array $data){

        $query = "UPDATE posts SET body = :body WHERE id = :post_id AND user_id = :user_id";

        $statement = $this->db->prepare($query);

        $result = parent::storeOrUpdate($this->db,$statement,$data);

        return $result;
    }
}