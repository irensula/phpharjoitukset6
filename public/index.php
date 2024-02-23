<?php

session_start();

$route = $_SERVER['REQUEST_URI'];

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
        break;
    case '/registration' :
        require '.././views/registration.php';
        break;
    default:
        http_response_code(404);
        require '.././views/404.php';
        break;
}