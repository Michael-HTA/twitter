<?php
namespace App\Controllers;

use App\Services\PostService;
use App\Services\UserService;

class SearchController {

    private $postService;
    private $userService;

    public function __construct()
    {
        $this->userService = new UserService();
        $this->postService = new PostService();
    }

    public function search(){
        $posts = $this->postService->search();
        $users = $this->userService->search();
        return view('/search', ['posts' => $posts, 'users' => $users]);
    }
}
