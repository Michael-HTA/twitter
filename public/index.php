<?php
error_reporting(E_ALL);
ini_set('display_errors',1);

// include_once __DIR__."/../app/Controllers/UserController.php";
// include_once __DIR__."/../app/Services/UserService.php";
include_once(__DIR__."/../vendor/autoload.php");
require_once(__DIR__.'/../routes/web.php');

use App\Controllers\RouteController;

// linux test@gmail.com password
// window admin@gmail.com admin

// $userController = UserController::class;
// echo $userController;
// die();

$_POST['email'] = 'test@gmail.com';
$_POST['password'] = 'password';


// die();
// exit();
// $_SERVER['REQUEST_URI'] = '/logout';
// echo '<pre>';
// var_dump($_SERVER);
// echo '</pre>';

// $_POST['email'] = 'admin@gmail.com';
// $_POST['password'] = 'admin';

// $stre = "";
// var_dump(strlen($stre));

$app = new RouteController();
var_dump($app->start());

var_dump($_SERVER['REQUEST_URI']);
var_dump($_SERVER['REQUEST_METHOD']);