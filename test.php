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

// $_POST['email'] = 'test@gmail.com';
// $_POST['password'] = 'password';

$_POST['email'] = 'admin@gmail.com';
$_POST['password'] = 'admin';
RouteService::post("/login",UserController::class,"login");
$call = new RouteService();
var_dump($call->callCorrespondentController("/login","POST"));
function dd($item){
    echo "<pre>";
    var_dump($item);
    echo "</pre>";
}

dd($_SERVER['REQUEST_METHOD']);
dd($_SERVER['REQUEST_URI']);


// $test = new $userController();
// $result = $test->login();
// var_dump($result);

// linux test@gmail.com password
// window admin@gmail.com admin

// $uri = "/profile/show/{id}/something/{id}/something/{jeje}";

// $result = str_replace('/','\/',$uri);
// echo $result;
// echo "<br/>";

// $pr = preg_replace('/{[^}]*}/','([^/]+)',$result);
// $pr = preg_replace('/[{]+[A-Za-z\d]+[}]+/','[A-Za-z\d]+', $result);
// echo $pr;
// echo "<br/>";
// $sr = '/^'.$pr.'$/';

// $incoming = '/profile/show/johndoe/something/20/something/hehehe';

// echo $sr;

// // $sr = '/^\/profile\/show\/[A-Za-z\d]+\/something\/[A-Za-z\d]+\/something\/something+$/';
// $a = preg_match_all($sr,$incoming,$matches);
// echo "<br/>";

// print_r($a);

// foreach($matches as $match){
//     var_dump($matches);
// }

// $routes = ['hello' => ['a' => 'hello from a', 'b' => 'hello from b', 'c' => 'hello from c']];

// foreach($routes as $key => $value){
//     echo "<br/>";
//     var_dump($key);
//     echo "<br/>";
//     var_dump($value['a']);
//     echo "<br/>";
//     var_dump($value['b']);
//     var_dump($value['c']);
// }

//  function callController(){
//     foreach($routes as $key => $value){
//         if(preg_match($key,$request)){
//             if($http_method === $vlaue['http_method'])
//                 $value['contoller'];
//                 $value['controller_method_name'];
//                 return $result;
//         }
//     }
// }


// function secondNested($hello){
//     echo $hello;
// }
// function nested($hello){
//     secondNested($hello);
// }
// echo '<br/>';
// nested('hello world');








