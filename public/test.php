<?php
error_reporting(E_ALL);
ini_set('display_errors',1);

// include_once __DIR__."/../app/Controllers/UserController.php";
// include_once __DIR__."/../app/Services/UserService.php";
include_once(__DIR__."/../vendor/autoload.php");

use App\Controllers\UserController;
use App\Services\UserService;
use App\Services\RouteService;

// $userController = UserController::class;
// echo $userController;
// die();

RouteService::get("/login",UserController::class,"login");
$call = new RouteService();
var_dump($call->callCorrespondentController("/login"));

// $test = new $userController();
// $result = $test->login();
// var_dump($result);

// linux test@gmail.com password
// window admin@gmail.com admin