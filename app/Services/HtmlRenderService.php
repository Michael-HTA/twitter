<?php

namespace App\Services;

class HtmlRenderService{

    public static function render($fileAndData){
       
        $fileBasePath = '/../../view';

        $fileName = $fileAndData['file'];
        $data = $fileAndData['data'] ?? null;

        //type casting
        if(isset($data)){
            foreach($data as $key => $value){
                ${$key} = (object)$value;
            }
        }

        //logic to render HTML from the file and data goes here
        require_once(__DIR__.$fileBasePath.$fileName.'.php');
        return TRUE;
    }
}
