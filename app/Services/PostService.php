<?php

namespace App\Services;

use App\Database\Tables\PostsTable;
use App\Database\Drivers\SQLite;

/**
 * getAllPost       R
 * getUserPost      R      
 * storeUserPost    C
 * updateUserPost   U  
 * deletUserPost    D  
 */

class PostService
{

    private $db;

    public function __construct()
    {
        $this->db = new PostsTable(new SQLite());
    }

    public function getAllPost()
    {
        return $this->db->getAllPost();
    }

    public function getUserPost($id)
    {
        $id =trim($id);

        //validate id is number or string number
        return is_numeric($id) && $id > 0 ? $this->db->getUserPost(['id' => $id]) : false;
    }

    public function storeUserPost()
    {

        // Validate and sanitize inputs
        $body    = isset($_POST['post_body']) ? trim($_POST['post_body']) : '';
        $user_id = isset($_POST['user_id']) ? trim($_POST['user_id']) : '';

        if (empty($body) || empty($user_id) || !is_numeric($user_id) || $user_id <= 0) {
            // Handle missing data error
            return false;
        }

        $data = [
            'body' => $body,
            'user_id' => $user_id,
        ];

        $result = $this->db->storeUserPost($data);

        if ($result !== false) {
            // do something
            session_regenerate_id();
            return $result;
        } else {
            return false;
        }
    }

    public function updateUserPost()
    {

        // Validate and sanitize inputs
        $body    = isset($_POST['post_body']) ? trim($_POST['post_body']) : '';
        $user_id = isset($_POST['user_id']) ? trim($_POST['user_id']) : '';
        $post_id = isset($_POST['post_id']) ? trim($_POST['post_id']) : '';

        // Check if required data is provided
        if (empty($body) || empty($user_id) || empty($post_id) || !is_numeric($user_id) || !is_numeric($post_id) || $user_id <= 0 || $post_id <= 0) {
            // Handle missing data error
            return false;
        }

        $data = [
            'body' => $body,
            'user_id' => $user_id,
            'post_id' => $post_id
        ];

        $result = $this->db->updateUserPost($data);

        if ($result !== false) {
            // do something
            session_regenerate_id();
            return $result;
        } else {
            return false;
        }
    }

    public function deleteUserPost(){
        
        $user_id = isset($_POST['user_id']) ? trim($_POST['user_id']) : '';
        $post_id = isset($_POST['post_id']) ? trim($_POST['post_id']) : '';

        // Check if required data is provided
        if (empty($user_id) || empty($post_id) || !is_numeric($user_id) || !is_numeric($post_id) || $user_id <= 0 || $post_id <= 0) {
            // Handle missing data error
            return false;
        }

        $data = [
            'user_id' => $user_id,
            'post_id' => $post_id
        ];
        $result = $this->db->deleteUserPost($data);

        if ($result !== false) {
            // do something
            session_regenerate_id();
            return $result;
        } else {
            return false;
        }
    }
}
