<?php

use App\Controllers\UserController;
use App\Controllers\PostController;
use App\Services\RouteService;
use App\Controllers\SearchController;
use App\Controllers\ProfileUploadController;
use App\Controllers\FileController;

RouteService::post('/login',UserController::class,'login')->middleware('guest');
RouteService::get('/',UserController::class,'index')->middleware('guest');
RouteService::get('/logout',UserController::class,'logout')->middleware('user');
RouteService::get('/dashboard',UserController::class,'dashboard')->middleware('user');
RouteService::get('/register',UserController::class,'add')->middleware('guest');
RouteService::post('/register', UserController::class,'register')->middleware('guest');

RouteService::get('/profile', UserController::class,'profile')->middleware('user');
RouteService::post('/post/add', PostController::class,'store')->middleware('user');
RouteService::delete('/post/delete', PostController::class,'delete')->middleware('user');

RouteService::get('/search', SearchController::class,'search')->middleware('user');

RouteService::post('/profile/upload', ProfileUploadController::class,'upload')->middleware('user');

RouteService::get('/files/get', FileController::class,'respond')->middleware('user');