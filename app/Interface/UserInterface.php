<?php
namespace App\Interface;

interface UserInterface{
    public function login();
    public function logout();
    public function register();
}