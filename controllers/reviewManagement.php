<?php 
require_once "database/models/review.php";
require_once 'libraries/cleaners.php';

function viewReviewsController(){
    $allReviews = null;
    if (isset($_POST['type'])) {
        $type = cleanUpInput($_POST['type']);
        $allReviews = getTypeReviews($type);
        if($type == "Kaikki tyypit") {
            $allReviews = getAllReviews();
        }
    }
    else {
        $allReviews = getAllReviews();
    }
    require "views/review.view.php";    
}

// POST values are from "name" in views
function addReviewController(){
    if(isset($_POST['reviewName'], $_POST['reviewText'], $_POST['reviewDate'], $_POST['reviewGrade'], $_POST['type'])){
        $rName = cleanUpInput($_POST['reviewName']);
        $rText = cleanUpInput($_POST['reviewText']);
        $rDate = cleanUpInput($_POST['reviewDate']);
        $rGrade = cleanUpInput($_POST['reviewGrade']);
        $rType = cleanUpInput($_POST['type']);   
        $userId = $_SESSION["userid"];
        addReview($rDate, $rType, $rName, $rGrade, $rText, $userId); 
        header("Location: /");    
    } else {
        require "views/newReview.view.php";
    }
}

function editReviewController(){
    try {
        if(isset($_GET["id"])){
            $rID = cleanUpInput($_GET["id"]);
            $reviews = getReviewById($rID);
        } else {
            echo "Virhe: id puuttuu ";    
        }
    } catch (PDOException $e){
        echo "Virhe uutista haettaessa: " . $e->getMessage();
    }
    
    if($reviews){
        $rID = $reviews['reviewID'];
        $rDate = $reviews['date'];
        $rType = $reviews['type'];
        $rName = $reviews['name'];
        // $dbtime = $reviews['created'];
        // $time = implode("T", explode(" ",$dbtime));
        $rGrade = $reviews['grade'];
        $rText = $reviews['text'];
        $userId = $reviews['userID'];
    
        require "views/updateReview.view.php";
    } else {
        header("Location: /");
        exit;
    }
}

function updateReviewController(){
    if(isset($_POST['newstitle'], $_POST['newstext'], $_POST['newstime'], $_POST['removedate'], $_POST['type'], $_POST["id"])){
        $title = cleanUpInput($_POST['newstitle']);
        $text = cleanUpInput($_POST['newstext']);
        $time = cleanUpInput($_POST['newstime']);
        $removetime = cleanUpInput($_POST['removedate']);
        $type = cleanUpInput($_POST['type']);
        $id = cleanUpInput($_POST["id"]);

        try{
            updateArticle($title, $text, $time, $removetime, $type, $id);
            header("Location: /");    
        } catch (PDOException $e){
                echo "Virhe uutista päivitettäessä: " . $e->getMessage();
        }
    } else {
        header("Location: /");
        exit;
    }
}

function deleteReviewController(){
    try {
        if(isset($_GET["id"])){
            $rID = cleanUpInput($_GET["id"]);
            deleteReview($rID);
        } else {
            echo "Virhe: id puuttuu ";    
        }
    } catch (PDOException $e){
        echo "Virhe uutista poistettaessa: " . $e->getMessage();
    }

    $allReviews = getAllReviews();

    header("Location: /");
    exit;
}





