<?php
namespace App\Services;

use App\Database\PostsTable;
use App\Database\SQLite;

class PostService{

    private $db;

    public function __construct()
    {
        $this->db = new PostsTable(new SQLite());
    }

    public function getAllPost()
    {
        return $this->db->getAllPost();
    }
}