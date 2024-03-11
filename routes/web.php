<?php

use App\Controllers\UserController;
use App\Services\RouteService;

RouteService::get('/login',UserController::class,'login');
RouteService::get('/logout',UserController::class,'logout');