<?php

function view($fileName, $data = null){
    $fileBasePath = '/../../view';

    //type casting
    if(isset($data)){
        foreach($data as $key => $value){
            ${$key} = (object)$value;
        }
    }

    return require_once(__DIR__.$fileBasePath.$fileName.'.php');
}