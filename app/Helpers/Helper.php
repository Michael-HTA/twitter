<?php
// namespace Helper;

function view($fileName, $data = null){
    $fileBasePath = '__DIR__./../../view/';

    //type casting
    $data = (object)$data;

    return [ $data, require_once($fileBasePath.$fileName.'.php')];
}