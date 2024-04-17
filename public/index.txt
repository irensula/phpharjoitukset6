<?php

session_start();

$route = $_SERVER['REQUEST_URI'];

require_once '.././controllers/userManagement.php';
require_once '.././controllers/reviewManagement.php';
require_once '.././libraries/auth.php';

switch ($route) {
    case '/' :
        require '.././views/home.php';
        break;
    case '' :
        require '.././views/home.php';
        break;
    case '/home' :
        require '.././views/home.php';
        break;
    case '/login' :
        require '.././views/login.php';
        loginController();
        break;
    case '/registration' :
        require '.././views/registration.php';
        registerController();
        break;
    default:
        http_response_code(404);
        require '.././views/404.php';
        break;
}