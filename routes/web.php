<?php

use App\Controllers\UserController;
use App\Services\RouteService;

RouteService::post('/login',UserController::class,'login')->middleware('guest');
RouteService::get('/',UserController::class,'index')->middleware('guest');
RouteService::get('/logout',UserController::class,'logout')->middleware('user');
RouteService::get('/dashboard',UserController::class,'dashboard')->middleware('user');
RouteService::get('/register',UserController::class,'add')->middleware('guest');
RouteService::post('/register', UserController::class,'register')->middleware('guest');

RouteService::get('/profile', UserController::class,'profile')->middleware('user');
