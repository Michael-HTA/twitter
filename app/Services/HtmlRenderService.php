<?php

namespace App\Services;
use stdClass;

class HtmlRenderService{


    // v-1
    // public static function render($fileAndData){
       
    //     $fileBasePath = '/../../view';

    //     $fileName = $fileAndData['file'];
    //     $data = $fileAndData['data'] ?? null;

    //     //type casting
    //     if(isset($data)){
    //         foreach($data as $key => $value){
    //             ${$key} = (object)$value;
    //         }
    //     }

    //     //logic to render HTML from the file and data goes here
    //     require_once(__DIR__.$fileBasePath.$fileName.'.php');
    //     return TRUE;
    // }
    
    //v-2
    public static function render($fileAndData){
       
        $fileBasePath = '/../../view';

        $fileName = $fileAndData['file'];
        $data = $fileAndData['data'] ?? null;

        //type casting
        if(isset($data)){
            foreach($data as $key => $value){
                ${$key} = self::arrayToObjectRecursive($value);
            }
        }

        //logic to render HTML from the file and data goes here
        require_once(__DIR__.$fileBasePath.$fileName.'.php');
        return TRUE;
    }


    private static function arrayToObjectRecursive($array) {
        $object = new stdClass();
        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $object->{$key} = arrayToObjectRecursive($value);
            } else {
                $object->{$key} = $value;
            }
        }
        return $object;
    }

    
}
