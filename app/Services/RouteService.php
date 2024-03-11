<?php
namespace App\Services;

class RouteService{
    public static $routes = [];
    public static $instance = null;

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

        session_start();

        if(!is_null($request)){
            foreach(self::$routes as $route){
                if(preg_match($route['uri'],$request)){
                    if($route['http_method'] === $http_method){
                        if($route['middleware'] !== null){
                            if(isset($_SESSION[$route['middleware']])){

                                $controller_name = $route['controller'];
                                $controller_method_name = $route['controller_method_name'];

                                //calling method from controller
                                $obj = new $controller_name();
                                $result = $obj->$controller_method_name();
            
                                //freeing the obj (I hope so!)
                                unset($obj);
                                return $result;

                            } else {
                                RedirectService::redirect('/');
                                exit();
                            }
                        } else {

                            $controller_name = $route['controller'];
                            $controller_method_name = $route['controller_method_name'];
        
                            $obj = new $controller_name();
                            $result = $obj->$controller_method_name();
        
                            //freeing the obj (I hope so!)
                            unset($obj);
                            return $result;
                        }
                    }
                }
            }
        }else{
            //If the incoming uri is not correct this will return
            return '<h1>Please Provide Correct Uri</h1>';
        }
    }


    private static function setRegexRoute($uri){

        $strReplace = str_replace('/','\/',$uri);
        $regex = preg_replace('/[{]+[A-Za-z\d]+[}]+/','[A-Za-z\d]+', $strReplace);
        $result = '/^'.$regex.'$/';
        return $result;
    }
    
    private static function setMethod($http_method,$uri,$controller, $controller_method_name){
        self::$routes[] = [
            'uri' => $uri,
            'http_method' => $http_method,
            'controller' => $controller,
            'controller_method_name'=> $controller_method_name,
            'middleware' => null,
        ];

        if(self::$instance){
            return self::$instance;
        } else {
            return self::$instance = new self();
        }
    }

    public static function get($uri,$controller,$controller_method_name){
        $regexUri = self::setRegexRoute($uri);
        return self::setMethod("GET",$regexUri,$controller,$controller_method_name);
    }

    public static function post($uri,$controller,$controller_method_name){
        $regexUri = self::setRegexRoute($uri);
        return self::setMethod("POST",$regexUri,$controller,$controller_method_name);
    }

    public static function put($uri,$controller,$controller_method_name){
        $regexUri = self::setRegexRoute($uri);
        return self::setMethod("POST",$regexUri,$controller,$controller_method_name);
    }

    public static function delete($uri,$controller,$controller_method_name){
        $regexUri = self::setRegexRoute($uri);
        return self::setMethod("POST",$regexUri,$controller,$controller_method_name);
    }

    public static function middleware($middleware){
        self::$routes[array_key_last(self::$routes)]['middleware'] = $middleware;
        // return self::$instance;
    }

}