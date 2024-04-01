<?php

namespace App\Services;

class TinkerService{

    public static function render($fileAndData){
        echo 'this is not working';
        die();
        $fileBasePath = '/../../view';
        var_dump($fileAndData);
        print_r($fileAndData);
        die();
        var_dump($fileAndData['file']);

        $filename = $fileAndData[0];
        $data = $fileAndData[1] ?? null;
        // var_dump($data);
        var_dump($filename);
        die();

        //type casting
        if(isset($data)){
            foreach($data as $key => $value){
                ${$key} = (object)$value;
            }
        }

        //logic to render HTML from the file and data goes here
        require_once(__DIR__.$fileBasePath.$fileName.'.php');
        // return TRUE;
    }
}
