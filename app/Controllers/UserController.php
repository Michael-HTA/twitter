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

        return view('/login');

    }

    public function login(){
        $user =$this->obj->login();

        //respond header
        http_response_code(200);

        //respond body
        return $user ? RedirectService::redirect(path:'/dashboard'): 'no_user';
    }

    public function add(){
        return view('/register');
    }

    public function register(){
        $lastId = $this->obj->register();
        RedirectService::redirect();
    }

    public function logout(){
        $isLogout =  $this->obj->logout();
        if($isLogout) RedirectService::redirect('/');
    }

    public function dashboard(){
        $user = $this->obj->login();
        return view('/main',['user' => $user]);
    }
}