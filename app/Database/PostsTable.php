<?php
namespace App\Database;

use App\Interface\DatabaseInterface;

class PostsTable{
    private $db;

    public function __construct(DatabaseInterface $mysql)
    {
        $this->db = $mysql->connect();
    }

    public function getAllPost(){
        $query = "SELECT * FROM posts";

        $statement = $this->db->prepare($query);
        $statement->execute();
        return $statement->fetchall();

    }
}