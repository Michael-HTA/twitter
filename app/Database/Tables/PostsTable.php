<?php

namespace App\Database\Tables;

use App\Interface\DatabaseInterface;
use PDOException;

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

            $query = "SELECT (users.first_name || ' ' || users.last_name) AS name, 
            posts.id, posts.body, posts.created_at FROM posts INNER JOIN users ON users.id = posts.user_id ORDER BY posts.created_at DESC";

            $statement = $this->db->prepare($query);


            $statement->execute();
            return $statement->fetchall();
        } catch (PDOException $e) {

            if ($e->getMessage()) {
                return false;
            }
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
            if ($e->getMessage()) {
                return false;
            }
        }
    }

    public function storeUserPost(array $data)
    {

        try {
            $query = "INSERT INTO posts (body,user_id) VALUES (:body,:user_id)";

            $statement = $this->db->prepare($query);

            $result = parent::storeOrUpdate($this->db, $statement, $data);

            return $result;
        } catch (PDOException $e) {
            if ($e->getMessage()) {
                return false;
            }
        }
    }

    public function updateUserPost(array $data)
    {

        try {
            $query = "UPDATE posts SET body = :body WHERE id = :post_id AND user_id = :user_id";

            $statement = $this->db->prepare($query);

            $result = parent::storeOrUpdate($this->db, $statement, $data);

            return $result;
        } catch (PDOException $e) {
            if ($e->getMessage()) {
                return false;
            }
        }
    }

    public function deleteUserPost(array $data)
    {

        try {

            $query = "DELETE FROM posts WHERE posts.id = :post_id AND posts.user_id = :user_id";

            $statement = $this->db->prepare($query);

            $result = parent::storeOrUpdate($this->db, $statement, $data);

            return $result;

        } catch (PDOException $e) {

            if ($e->getMessage()) {
                return false;
            }
        }
    }
}
