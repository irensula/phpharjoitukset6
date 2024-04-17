<?php

session_start();
set_include_path(dirname(__FILE__) . '/../');

$route = explode("?", $_SERVER["REQUEST_URI"])[0];
$method = strtolower($_SERVER["REQUEST_METHOD"]);

require_once '.././libraries/auth.php';
require_once '.././controllers/userManagement.php';
require_once '.././controllers/reviewManagement.php';

switch ($route) {
    case '/' :
        viewReviewsController();
        break;

    case '' :
        viewReviewsController();
        break;

    case '/home' :
        viewReviewsController();;
        break;

    case '/login' :
        loginController();
        break;

    case '/registration' :
        registerController();
        break;

    case '/logout' :
        logoutController();
        break;
    
    case "/add_review":
        if(isLoggedIn()){
            addReviewController();
        } else {
            loginController();
        }
        break;

    case "/delete_review":
        if(isLoggedIn()){
            deleteReviewController();
        } else {
            loginController();
        }
        break;
        
    case "/update_review":
        if(isLoggedIn()){
            if($method == "get"){
              editReviewController();  
            } else {
              updateReviewController();
            }
          } else {
            loginController();
          }
        break;

    default:
        // http_response_code(404);
        // require '.././views/404.php';
        echo "404";
}