<?php
namespace App\Services;

class RouteService{
    private static $routes = [];

    public static function get($uri,$controller,$controller_method_name){
        self::$routes[$uri] = [
            'http_method' => "GET",
            'controller' => $controller,
            'controller_method_name'=> $controller_method_name,
        ];
    }

    public function callCorrespondentController($request){
            if(array_key_exists($request,self::$routes)){
                $obj_name = self::$routes[$request]['controller'];
                $obj_method_name = self::$routes[$request]['controller_method_name'];
                $controller = new $obj_name();
                return $controller->$obj_method_name();
            }
    }
}