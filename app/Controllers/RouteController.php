<?php
namespace App\Controllers;

use App\Services\AuthService;
use App\Services\RouteService;
use App\Services\RedirectService;
use App\Services\TinkerService;

class RouteController{

    private $routeService;

    public function __construct()
    {
        $this->routeService = new RouteService();
    }

    public function getUrl(){

        // return parse_url($_SERVER['REQUEST_URI'])['path'];
        $parsed_url = parse_url($_SERVER['REQUEST_URI']);
        return $parsed_url !== false && isset($parsed_url['path']) ? $parsed_url['path'] : null;
 
    }

    public function getHttpMethod(){
        return $_SERVER['REQUEST_METHOD'];
    }

    public function lastVisitUri(){
        $_SESSION['lastVisitUri'] = $this->getUrl();
        var_dump($_SESSION['lastVisitUri']);
    }

    public function start(){

        //set the user's role to guest if user is not login
        AuthService::setUser();
        // var_dump($this->routeHandler());
        return $this->routeHandler();
        // return $result = $this->routeHandler();

        // if(isset($result)){
        //     $this->lastVisitUri();
            
        //     return $result;
        // }
        
    }

    public function routeHandler(){

        $route = $this->routeService->callCorrespondentController($this->getUrl(),$this->getHttpMethod());
        echo 'this is working';
        var_dump($route['file']);

        if(is_string($route)){
            switch($route){
                case 'wrong_uri':
                    http_response_code(404);
                    RedirectService::redirect(prefix:'404');
                    break;
                case 'not_auth':
                    http_response_code(403);
                    RedirectService::redirect(prefix:'message',query:$route);
                    break;
                case 'no_user';
                    RedirectService::redirect(prefix:'incorrect');
                    break;
                default:
                // array not string put this logic out of the switch
                echo 'this is working';
                    $test = [
                        'file' => 'filename',
                        'data' => 'dataname',
                    ];
                    TinkerService::render($test);
                    
            }
        } elseif(is_null($route)){
            http_response_code(404);
            RedirectService::redirect(prefix:'404');
        }
    }
}

