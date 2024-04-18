<?php
require_once "../database/connection.php";

function getAllReviews(){
    $pdo = connectDB();
    $sql = "SELECT * FROM review";
    $stm = $pdo->query($sql);
    $all = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $all;
}

// function arguments are variables from addReviewController
function addReview($rDate, $rType, $rName, $rGrade, $rText, $userId){
    $pdo =connectDB();
    $data = [$rDate, $rType, $rName, $rGrade, $rText, $userId];
    $sql = "INSERT INTO review (date, type, name, grade, text, userID) VALUES(?,?,?,?,?,?)";
    $stm=$pdo->prepare($sql);
    return $stm->execute($data);
}

function getReviewById($rID){
    $pdo = connectDB();
    $sql = "SELECT * FROM review WHERE reviewID=?";
    $stm= $pdo->prepare($sql);
    $stm->execute([$rID]);
    $all = $stm->fetch(PDO::FETCH_ASSOC);
    return $all;
}

function deleteReview($rID){
    $pdo = connectDB();
    $sql = "DELETE FROM review WHERE reviewID=?";
    $stm=$pdo->prepare($sql);
    return $stm->execute([$rID]);
}

function updateReview($rDate, $rType, $rName, $rGrade, $rText, $rID){
    $pdo = connectDB();
    $data = [$rDate, $rType, $rName, $rGrade, $rText, $rID];
    $sql = "UPDATE review SET date = ?, type = ?, name = ?, grade = ?, text = ? WHERE reviewID = ?";
    $stm = $pdo->prepare($sql);
    return $stm->execute($data);
}

function getReviewType($rType){
    $pdo =connectDB();
    $sql = "SELECT * FROM review WHERE type = ?";
    $stm=$pdo->prepare($sql);
    $stm->execute(array($rType));
    $all = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $all;
} 