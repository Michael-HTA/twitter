<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
use App\Controllers\LoginController;

require_once("../app/Controllers/LoginController.php");

$test = new LoginController();
$test->login();