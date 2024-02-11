<?php
namespace App\Interface;

interface LoginInterface{
    public function login():mixed;
    public function logout();
    public function register();
}