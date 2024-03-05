<?php
namespace App\Services;

class RouteService{
    private static $routes = [];

    public function callCorrespondentController($request,$http_method){
        if(array_key_exists($request,self::$routes)){
            if(self::$routes[$request]['http_method'] === $http_method){
                $obj_name = self::$routes[$request]['controller'];
                $obj_method_name = self::$routes[$request]['controller_method_name'];
                $controller = new $obj_name();
                $result = $controller->$obj_method_name();

                //freeing the obj (I hope so!)
                unset($controller);
                return $result;
            }
        }
    }
    
    private static function setMethod($http_method,$uri,$controller, $controller_method_name){
        self::$routes[$uri] = [
            'http_method' => $http_method,
            'controller' => $controller,
            'controller_method_name'=> $controller_method_name,
        ];
    }

    public static function get($uri,$controller,$controller_method_name){
        self::setMethod("GET",$uri,$controller,$controller_method_name);
    }

    public static function post($uri,$controller,$controller_method_name){
        self::setMethod("POST",$uri,$controller,$controller_method_name);
    }

    public static function put($uri,$controller,$controller_method_name){
        self::setMethod("PUT",$uri,$controller,$controller_method_name);
    }

    public static function delete($uri,$controller,$controller_method_name){
        self::setMethod("DELETE",$uri,$controller,$controller_method_name);
    }


}