<?php

namespace App\Controllers;

use App\Services\FileService;

class FileController{
    private $fileService;

    public function __construct(){

        $this->fileService = new FileService();
        
    }

    public  function respond(){
        
        header('Content-Type: ' . filetype($this->fileService->getPath()));
        header('Content-Length: ' . filesize($this->fileService->getPath()));
        http_response_code(200);
        return $this->fileService->imageResponse();
    } 
}