<?php
error_reporting(E_ALL);
ini_set('display_errors',1);

// include_once __DIR__."/../app/Controllers/UserController.php";
// include_once __DIR__."/../app/Services/UserService.php";
include_once(__DIR__."/../vendor/autoload.php");
require_once(__DIR__.'/../routes/web.php');

use App\Controllers\RouteController;
use App\Controllers\UserController;
use App\Services\AuthService;
use App\Services\RouteService;

// linux test@gmail.com password
// window admin@gmail.com admin

// $userController = UserController::class;
// echo $userController;
// die();

// $_POST['email'] = 'test@gmail.com';
// $_POST['password'] = 'password';


// die();
// exit();
// $_SERVER['REQUEST_URI'] = '/logout';
// echo '<pre>';
// var_dump($_SERVER);
// echo '</pre>';

$_POST['email'] = 'admin@gmail.com';
$_POST['password'] = 'admin';

// $stre = "";
// var_dump(strlen($stre));

$app = new RouteController();
var_dump($app->start());

var_dump($_SERVER['REQUEST_URI']);
var_dump($_SERVER['REQUEST_METHOD']);


function dd($value){
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
}




// $routes = [];

// $routes[] = ['name' => 'mike'];
// $routes[] = ['name' => 'some'];

// foreach($routes as $route){
//     echo '<pre>';
//     var_dump($route);
//     echo '</pre>';
// }

// echo '<pre>';
// var_dump($routes);
// echo '</pre>';


// class Test{
//     public static $test = 'hello';

//     public static function getClass() {
//         return new self();
//     }
// }

// echo '<br>';
// echo Test::$test;
// $instance = Test::getClass();
// echo '<br>';
// $value1 = $instance::$test;
// echo $value1;
// echo '<br>';
// $instance::$test = 'world';
// $value2 = Test::$test;
// echo $value2;
// echo '<br>';
// $items = [];
// $items = [
//     ['aa'=>'a', 'bb'=>'v','cc'=>'c'],
//     ['aa'=>'d', 'bb'=>'e','cc'=>'f']
// ];

// dd(array_key_last($items));

// dd($items);
// dd($items[array_key_last($items)]);

// $result = $items[array_key_last($items)];
// $result['cc'] = 'dd';

// dd($result);

dd(RouteService::$routes);