<?php

namespace App\Database\Tables;

use App\Interface\DatabaseInterface;
use PDOException;
use PDO;

/**
 * getAllPost
 * getUserPost
 * storeUserPost
 * updateUserPost
 * deleteUserPost
 * 
 */
class PostsTable extends Table
{
    private $db;

    public function __construct(DatabaseInterface $mysql)
    {
        $this->db = $mysql->connect();
    }

    public function getAllPost()
    {

        try {
            //sqlite
            // $query = "SELECT (users.first_name || ' ' || users.last_name) AS name, 
            // posts.id, posts.body, posts.created_at FROM posts INNER JOIN users ON users.id = posts.user_id ORDER BY posts.created_at DESC";

            // maria or mysql
            $query = "SELECT CONCAT(users.first_name, ' ', users.last_name) AS name, users.photo , posts.id, posts.body, 
            posts.created_at FROM posts INNER JOIN users ON users.id = posts.user_id ORDER BY posts.created_at DESC";


            $statement = $this->db->prepare($query);


            $statement->execute();
            return $statement->fetchall();
        } catch (PDOException $e) {

            error_log(date('[Y-m-d H:i:s]') . "Error at all post: ". $e->getMessage() . "\n",3,'/var/www/html/logs/twitter-error.log');
            return false;
        }
    }

    //for profile page 
    public function getUserPost(array $id)
    {
        try {

            $query = "SELECT * FROM posts WHERE posts.user_id = :id ORDER BY posts.created_at DESC";

            $statement = $this->db->prepare($query);
            $statement->execute($id);
            return $statement->fetchall();
        } catch (PDOException $e) {

            error_log(date('[Y-m-d H:i:s]') . "Error at user post: ". $e->getMessage() . "\n",3,'/var/www/html/logs/twitter-error.log');
            return false;
        }
    }

    public function storeUserPost(array $data)
    {

        $query = "INSERT INTO posts (body,user_id) VALUES (:body,:user_id)";

        $statement = $this->db->prepare($query);

        $result = parent::storeOrUpdate($this->db, $statement, $data);

        return $result;
    }

    public function updateUserPost(array $data){

        $query = "UPDATE posts SET body = :body WHERE id = :post_id AND user_id = :user_id";

        $statement = $this->db->prepare($query);

        $result = parent::storeOrUpdate($this->db, $statement, $data);

        return $result;
       
    }

    public function deleteUserPost(array $data)
    {

        try {

            $query = "DELETE FROM posts WHERE posts.id = :post_id AND posts.user_id = :user_id";

            $statement = $this->db->prepare($query);

            $result = parent::storeOrUpdate($this->db, $statement, $data);

            return $result;

        } catch (PDOException $e) {

            error_log(date('[Y-m-d H:i:s]') . "Error at delete post table: ". $e->getMessage() . "\n",3,'/var/www/html/logs/twitter-error.log');
            return false;
        }
    }

    public function search($search){
        
    // $query = "SELECT body FROM posts WHERE body LIKE :search";

    $query = "SELECT CONCAT(users.first_name, ' ', users.last_name) AS user_name, posts.id, 
                posts.body, posts.created_at FROM posts INNER JOIN users ON users.id = posts.user_id 
                WHERE posts.body LIKE :search ORDER BY posts.created_at DESC";
        
    $statement = $this->db->prepare($query);
    
    $searchTerm = '%'.$search.'%'; // Concatenating % around the search term
    
    $statement->bindValue(':search', $searchTerm, PDO::PARAM_STR);

    $statement->execute();

    return $statement->fetchAll();
}
}
