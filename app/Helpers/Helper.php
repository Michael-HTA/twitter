<?php

function view($fileName = null, $data = null){

    return isset($data) ? ['file' => $fileName,'data' => $data] : ['file' => $fileName];
}