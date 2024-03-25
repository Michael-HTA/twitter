<?php

use App\Controllers\UserController;
use App\Services\RouteService;

RouteService::post('/login',UserController::class,'login');
RouteService::get('/',UserController::class,'index');
RouteService::get('/logout',UserController::class,'logout')->middleware('guest');
RouteService::get('/dashboard',UserController::class,'dashboard');
RouteService::get('/register',UserController::class,'register');