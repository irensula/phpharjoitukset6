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

function addReviewController(){
    if(isset($_POST['newstitle'], $_POST['newstext'], $_POST['newstime'], $_POST['removedate'], $_POST['type'],)){
        $title = cleanUpInput($_POST['newstitle']);
        $text = cleanUpInput($_POST['newstext']);
        $time = cleanUpInput($_POST['newstime']);
        $removetime = cleanUpInput($_POST['removedate']);
        $type = cleanUpInput($_POST['type']);   
        $userid = $_SESSION["userid"];
        addArticle($title, $text, $time, $removetime, $type, $userid); 
        header("Location: /");    
    } else {
        require "views/newArticle.view.php";
    }
}

function editReviewController(){
    try {
        if(isset($_GET["id"])){
            $id = cleanUpInput($_GET["id"]);
            $news = getArticleById($id);
        } else {
            echo "Virhe: id puuttuu ";    
        }
    } catch (PDOException $e){
        echo "Virhe uutista haettaessa: " . $e->getMessage();
    }
    
    if($news){
        $id = $news['articleid'];
        $title = $news['title'];
        $text = $news['text'];
        $dbtime = $news['created'];
        $time = implode("T", explode(" ",$dbtime));
        $removetime = $news['expirydate'];
        $type = $news['type'];
        $id = $news['articleid'];
    
        require "views/updateArticle.view.php";
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
            $id = cleanUpInput($_GET["id"]);
            deleteArticle($id);
        } else {
            echo "Virhe: id puuttuu ";    
        }
    } catch (PDOException $e){
        echo "Virhe uutista poistettaessa: " . $e->getMessage();
    }

    $allnews = getAllArticles();

    header("Location: /");
    exit;
}





