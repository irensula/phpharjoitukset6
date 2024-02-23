<?php
require_once "../database/connection.php";

// test
function showAllUsers(){
    $pdo = connectDB();  
    $sql = "SELECT * FROM user";
    $stm = $pdo->query($sql);
    $users = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $users;
}

function addUser($username, $pwd){
    $pdo = connectDB();
    $hashedpassword = hashPassword($pwd);
    $data = [$username, $hashedpassword];
    $sql = "INSERT INTO user (username, pwd) VALUES(?,?,?,?)";
    $stm=$pdo->prepare($sql);
    return $stm->execute($data);
}

function login($username, $pwd){
    $pdo = connectDB();
    $sql = "SELECT * FROM user WHERE username=?";
    $stm= $pdo->prepare($sql);
    $stm->execute([$username]);
    $user = $stm->fetch(PDO::FETCH_ASSOC);
    $hashedpassword = $user["pwd"];

    if($hashedpassword && password_verify($pwd, $hashedpassword))
        return $user;
    else 
        return false;
}