<?php
error_reporting(E_ALL);
ini_set('display_errors',1);

// include_once __DIR__."/../app/Controllers/UserController.php";
// include_once __DIR__."/../app/Services/UserService.php";

//including auto load
include_once(__DIR__."/../vendor/autoload.php");
// require_once(__DIR__.'/../routes/web.php');

use App\Controllers\RouteController;


// phpinfo();
// Format the current time
// $created_at = date('m-d-Y H:i:s',time());

// echo $created_at; // Output: System local time in 'Y-m-d H:i:s' format

// die();

// linux test@gmail.com password
// window admin@gmail.com admin
// $time = '2024-04-03 09:16:56';

// $obj->time = '2024-04-03 09:16:56';
// $obj->ObjTime = date("d-m-Y",strtotime($obj->time));
// var_dump($obj->ObjTime);

// $data = [
//     'users' => [
//         ['name' => 'mike'],
//         ['name' => 'louis'],
//         ['name' => 'steven'],
//     ]
//     ];

// function arrayToObjectRecursive($array) {
//     $object = new stdClass();
//     foreach ($array as $key => $value) {
//         if (is_array($value)) {
//             $object->{$key} = arrayToObjectRecursive($value);
//         } else {
//             $object->{$key} = $value;
//         }
//     }
//     return $object;
// }

// Example nested array
// $nestedArray = [
//         'users' => 
//             [
//             'name' => 'John',
//             'age' => 30,
//             'contacts' => 
//                 [
//                     'email' => 'john@example.com',
//                     'phone' => '1234567890'
//                 ]
//                 ],
//             'consumer' => [
//                 'name' => 'louis',
//             ]
// ];
// $data = (object)$nestedArray;
// Create $users variable dynamically
// foreach($nestedArray as $key => $value){
//     ${$key} = arrayToObjectRecursive($value);
// }

// $users->{$key} = ${$key};
// Access the properties dynamically
// echo $users->name . "\n"; // Outputs: John
// echo $users->age . "\n"; // Outputs: 30
// echo $users->contacts->email . "\n"; // Outputs: john@example.com
// echo $users->contacts->phone . "\n"; // Outputs: 1234567890

// echo $consumer->name . "\n"; 






// $data = [
//     'users' => ['name' => 'steven']
//     ];


// foreach($data as $key => $value){
//     ${$key} = (object) $value;
//     if(isset(${$key}->{0})){
//         unset(${$key});
//         ${$key} = [];
//         foreach(${$key} as $secondKey => $secondValue){
//             ${$key} =(object) $secondValue;
//         }
//     }

    // var_dump(${$key});
// }

// foreach($users as $user){
//     echo '<pre>';
//     var_dump($user->name);
//     echo '</pre>';
// }



// echo gettype($users->{0});
// print_r($users->{0});
// foreach($users as $user){
//     print_r($user);
// }
// print_r($users);

// die();

// if(isset($_GET['message'])){
//     $message = urldecode($_GET['message']);
//     echo "<p> $message </p>";
// }

// $_POST['email'] = 'test@gmail.com';
// $_POST['password'] = 'passwordd';

// dd($_SERVER);


$app = new RouteController();
$app->start();


// var_dump($_SESSION['last_visit_uri']);

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



// var_dump($_SERVER['REQUEST_URI']);
// var_dump($_SERVER['REQUEST_METHOD']);



function dd($value){
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
    die();
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
// $cow = 'sdfsdf';
// dd($cow ?? 'nothing');