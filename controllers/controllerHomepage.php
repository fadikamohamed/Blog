<?php
    function homepage(){
        $articles = NEW Articles();
        $articleData = $articles->getLastArticles();
        
        $getPictures = NEW Pictures();
        $picturesList = $getPictures->getAllPictures();
        
        require_once 'views/viewHomepage.php';
    }
?>