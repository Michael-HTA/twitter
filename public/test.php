<?php
error_reporting(E_ALL);
ini_set('display_errors',1);

include_once __DIR__."/../app/Controllers/LoginController.php";
include_once __DIR__."/../app/Services/LoginService.php";

use App\Controllers\LoginController;
use App\Services\LoginService;


$test = new LoginController(new LoginService);
$result = $test->login();
var_dump($result->name);