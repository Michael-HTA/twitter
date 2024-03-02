<?php
error_reporting(E_ALL);
ini_set('display_errors',1);

include_once __DIR__."/../app/Controllers/UserController.php";
include_once __DIR__."/../app/Services/UserService.php";

use App\Controllers\UserController;
use App\Services\UserService;

$test = new UserController(new UserService);
$result = $test->login();
var_dump($result);