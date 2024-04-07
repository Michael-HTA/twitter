<?php

namespace App\Controllers;

use App\Services\PostService;
use App\Services\RedirectService;

class PostController
{

    private $PostService;

    public function __construct()
    {
        $this->PostService = new PostService();
    }

    public function store()
    {

        if ($this->PostService->storeUserPost() !== false) {
            http_response_code(200);
            RedirectService::back('success');
        } else {
            http_response_code(400);
            RedirectService::back('error');
        }
    }

    public function delete(){

        if ($this->PostService->deleteUserPost() !== false) {
            http_response_code(200);
            RedirectService::back('success');
        } else {
            http_response_code(400);
            RedirectService::back('error');
        }
    }
}
