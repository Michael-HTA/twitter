<?php
namespace App\Services;

class RouteService{
    private static $routes = [];

    // allCorrespondentController() => version one
    // public function callCorrespondentController($request,$http_method){
    //     if(array_key_exists($request,self::$routes)){
    //         if(self::$routes[$request]['http_method'] === $http_method){
    //             $obj_name = self::$routes[$request]['controller'];
    //             $obj_method_name = self::$routes[$request]['controller_method_name'];
    //             $controller = new $obj_name();
    //             $result = $controller->$obj_method_name();

    //             //freeing the obj (I hope so!)
    //             unset($controller);
    //             return $result;
    //         }
    //     }
    // }

    public function callCorrespondentController($request,$http_method){
        foreach(self::$routes as $key => $value){
            if(preg_match($key,$request)){
                if($value['http_method'] === $http_method){
                    $controller_name = $value['controller'];
                    $controller_method_name = $value['controller_method_name'];

                    $obj = new $controller_name();
                    $result = $obj->$controller_method_name();

                    //freeing the obj (I hope so!)
                    unset($obj);
                    return $result;
                }
            }
        }
    }




    private static function setRegexRoute($uri){

        $strReplace = str_replace('/','\/',$uri);
        $regex = preg_replace('/[{]+[A-Za-z\d]+[}]+/','[A-Za-z\d]+', $strReplace);
        $result = '/^'.$regex.'$/';
        return $result;
    }
    
    private static function setMethod($http_method,$uri,$controller, $controller_method_name){
        self::$routes[$uri] = [
            'http_method' => $http_method,
            'controller' => $controller,
            'controller_method_name'=> $controller_method_name,
        ];
    }

    public static function get($uri,$controller,$controller_method_name){
        $regexUri = self::setRegexRoute($uri);
        self::setMethod("GET",$regexUri,$controller,$controller_method_name);
    }

    public static function post($uri,$controller,$controller_method_name){
        $regexUri = self::setRegexRoute($uri);
        self::setMethod("POST",$regexUri,$controller,$controller_method_name);
    }

    public static function put($uri,$controller,$controller_method_name){
        $regexUri = self::setRegexRoute($uri);
        self::setMethod("PUT",$regexUri,$controller,$controller_method_name);
    }

    public static function delete($uri,$controller,$controller_method_name){
        $regexUri = self::setRegexRoute($uri);
        self::setMethod("DELETE",$regexUri,$controller,$controller_method_name);
    }


}