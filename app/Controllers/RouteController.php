<?php
namespace App\Controllers;

use App\Services\RouteService;

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

    public function start(){
        $route = $this->routeService->callCorrespondentController($this->getUrl(),$this->getHttpMethod());

        return $route ?? '404 Not Found';
    }
}