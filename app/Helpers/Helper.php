<?php

function view($fileName, $data = null){
//    var_dump($fileName);
//    die();
    return isset($data) ? ['file' => $fileName,'data' => $data] : ['file' => $fileName];
}