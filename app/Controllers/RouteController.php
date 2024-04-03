<?php
namespace App\Controllers;

use App\Services\AuthService;
use App\Services\HtmlRenderService;
use App\Services\RouteService;
use App\Services\RedirectService;


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
        
        $_SESSION['last_visit_uri'] = $this->getUrl();
    }

    public function start(){

        AuthService::setUser();
        if($this->routeHandler()) $this->lastVisitUri();
        
    }

    public function routeHandler(){

        $route = $this->routeService->callCorrespondentController($this->getUrl(),$this->getHttpMethod());

        //redirecting for error route
        if(is_string($route)){
            switch($route){
                // 404 but not 404 user error
                case 'wrong_uri':
                    http_response_code(404);
                    RedirectService::redirect(prefix:'404');
                    break;
                case 'not_auth':
                    //forbidden route
                    http_response_code(403);
                    RedirectService::back('suspended');
                    break;
            }
        //redirecting 404 route no uri registered
        } elseif(is_null($route)){

            http_response_code(404);
            RedirectService::redirect(prefix:'404');

        } else{
            // rendering html page
            return HtmlRenderService::render($route);

        }
    }
}

