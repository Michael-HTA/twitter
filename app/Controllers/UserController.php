<?php
namespace App\Controllers;

error_reporting(E_ALL);
ini_set('display_errors',1);


// require_once(__DIR__."/../Interface/UserInterface.php");
// use App\Services\LoginService;
// require_once "../Services/LoginService.php";


// include_once(__DIR__."/../../vendor/autoload.php");
use App\Interface\UserInterface;
use App\Services\UserService;
use App\Services\RedirectService;


class UserController{
    private $obj;

    public function __construct(){

        $this->obj = new UserService();
    }

    public function index(){
        
        http_response_code(200);
        return view('/login');

    }

    public function login(){

        $user =$this->obj->login();

        if($user !== false){
            //respond header
            http_response_code(200);
            RedirectService::redirect(path:'/dashboard');
        } else {
            http_response_code(401);
            RedirectService::back('incorrect');
        }
    }

    public function add(){

        //respond header
        http_response_code(200);
        return view('/register');
    }

    public function register(){
        
        $lastId = $this->obj->register();

        // redirecting user
        if($lastId !== false && $lastId !== 0){
            //respond if intended to use 201 return the data don't redirect, it won't work
            http_response_code(200);
            RedirectService::redirect(path:'/',prefix:'registered');
        } else {
            http_response_code(400);
            RedirectService::back('incorrect');
        }
    }

    public function logout(){

        $isLogout =  $this->obj->logout();
        http_response_code(200);
        if($isLogout) RedirectService::redirect('/');
    }

    public function dashboard(){

        http_response_code(200);
        $user = $this->obj->login();
        return view('/main',['user' => $user]);
    }
}