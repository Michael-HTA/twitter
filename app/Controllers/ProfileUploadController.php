<?php

namespace App\Controllers;

use App\Services\FileService;
use App\Services\RedirectService;

class ProfileUploadController
{

    private $fileService;

    public function __construct()
    {
        $this->fileService = new FileService();
    }

    public function upload()
    {
        $result = $this->fileService->store();

        if($result !== false && $result === true){
            RedirectService::redirect(path:"/profile");
        } else {
            RedirectService::redirect(path:'/profile', prefix:'error');
        }
    }
}
