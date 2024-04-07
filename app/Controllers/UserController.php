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
use App\Services\PostService;

/**
 * login_page
 * login                R
 * logout               R
 * register_page
 * register             C
 * dashboard            R
 * profile_page
 * user_info_page   
 * user_info_update     U
 */

class UserController{
    private $userObj;

    public function __construct(){

        $this->userObj = new UserService();
    }

    // login page
    public function index(){
        
        http_response_code(200);
        return view('/login');

    }

    //login 
    public function login(){

        $user =$this->userObj->login();

        if($user !== false){
            //respond header
            http_response_code(200);
            RedirectService::redirect(path:'/dashboard');
        } else {
            http_response_code(401);
            RedirectService::back('incorrect');
        }
    }

    //register page
    public function add(){

        //respond header
        http_response_code(200);
        return view('/register');
    }

    //register
    public function register(){
        
        $lastId = $this->userObj->register();
        
        // redirecting user
        if($lastId !== false && $lastId !== 0){
            //respond if intended to use 201 return the data, don't redirect, it won't work
            http_response_code(200);
            RedirectService::redirect(path:'/',prefix:'registered');
        } else {
            http_response_code(400);
            RedirectService::back('incorrect');
        }
    }

    //logout
    public function logout(){

        $isLogout =  $this->userObj->logout();
        http_response_code(200);
        if($isLogout) RedirectService::redirect('/');
    }

    //redirect after login and main page
    public function dashboard(){

        $postService = new PostService();

        //user's data
        $user = $this->userObj->login();

        // posts for new feed
        $posts = $postService->getAllPost();

        http_response_code(200);

        return view('/main',[
            'user' => $user,
            'posts' => $posts,
        ]);
    }

    //profile page for current user
    public function profile(){
       
        $post = new PostService();
        $user = $this->userObj->login();
        $posts = $post->getUserPost($user->id);

        if($posts !== false && $user !== false){
            //profile
            http_response_code(200);    
            return view('/profile',['posts' => $posts, 'user' => $user]);
        } else {
            http_response_code(503);
            RedirectService::back();
        }
    }

    //user's update
    public function update(){
        
        $result = $this->userObj->update();

        if ($result !== false) {
            // accepted no content
            http_response_code(204);
            RedirectService::redirect('/profile');
        } else {

            http_response_code(400);
            RedirectService::back('error');
        } 
    }

    // user data detail page
    public function detail(){
        //getting user data
        $user = $this->userObj->login();
        return view('userDetail',['user' => $user]);
    }
}