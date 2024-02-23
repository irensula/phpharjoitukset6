<?php
require_once "database/models/user.php";
require_once 'libraries/cleaners.php';

function registerController(){
    if(isset($_POST['username'], $_POST['pwd'])){
        $username = cleanUpInput($_POST['username']);
        $pwd = cleanUpInput($_POST['pwd']);

        try {
            addUser($username, $pwd);
            header("Location: /login"); 
        } catch (PDOException $e){
            echo "Virhe tietokantaan tallennettaessa: " . $e->getMessage();
        }
    } else {
        require "views/register.view.php";
    }
}

function loginController(){
    if(isset($_POST['username'], $_POST['pwd'])){
        $username = cleanUpInput($_POST['username']);
        $pwd = cleanUpInput($_POST['pwd']);
  
        $result = login($username, $pwd);
        if($result){
            $_SESSION['username'] = $result['username'];
            $_SESSION['userid'] = $result['userid'];
            $_SESSION['session_id'] = session_id();
            header("Location: /"); 
        } else {
            require "views/login.php";
        }
    } else {
        require "views/login.php";
    }
}

function logoutController(){
    session_unset(); //poistaa kaikki muuttujat
    session_destroy();
    setcookie(session_name(),'',0,'/'); //poistaa evästeen selaimesta
    session_regenerate_id(true);
    header("Location: /login"); // forward eli uudelleenohjaus
    die();
}