<?php
require_once 'configuration.php';
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <meta property="og:title" content="The Rock" />
        <meta property="og:type" content="video.movie" />
        <meta property="og:url" content="http://www.imdb.com/title/tt0117500/" />
        <meta property="og:image" content="http://ia.media-imdb.com/images/rock.jpg" />
        <link rel="stylesheet" href="assets/css/bootstrap/css/bootstrap.css" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css">
        <link rel="stylesheet" href="https://rawgit.com/enyo/dropzone/master/dist/dropzone.css" />
        <link rel="stylesheet" href="assets/css/carousel.css">   
        <link rel="stylesheet" href="assets/css/animate.css">   
        <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
        <link rel="stylesheet" href="assets/css/style.css">   
        <title>Blog articles et photos</title>
    </head>
    <body>
        <header class="header">
            <div class="container-fluid">
                <div id="banner" class="row justify-content-center">
                    <h1 class="title">Blog articles et photos</h1>
                </div>
            </div>

            <nav class="navBar">
                <ul>
                    <li><a href="index.php?page=accueil">Accueil</a></li>
                    <li><a href="index.php?page=articles">Articles</a></li>
                    <li><a href="">Album photos</a></li>
                    <li><a href="">Concours</a></li>
                    <li><a href="">Contact</a></li>
                    <li><a href="index.php?page=admin&tab=articles">Admin</a></li>
                </ul>
            </nav>

            <div class="pos-f-t fixed-top smallNav">
                <div class="collapse" id="navbarToggleExternalContent">
                    <div class="bg-dark p-4">
                        <ul class="text-center">
                            <li class="nav-item headerNavbar d-block btn btn-outline-primary btn-lg mt-1"><a href="index.php?page=accueil">Accueil</a></li>
                            <li class="nav-item headerNavbar d-block btn btn-outline-primary btn-lg mt-1"><a href="index.php?page=articles">Articles</a></li>
                            <li class="nav-item headerNavbar d-block btn btn-outline-primary btn-lg mt-1"><a href="#">Album photos</a></li>
                            <li class="nav-item headerNavbar d-block btn btn-outline-primary btn-lg mt-1 mt-1"><a href="#">Concours</a></li>
                            <li class="nav-item headerNavbar d-block btn btn-outline-primary btn-lg mt-1"><a href="#">Contact</a></li>
                            <li class="nav-item headerNavbar d-block btn btn-outline-primary btn-lg mt-1"><a href="index.php?page=admin&tab=articles">Admin</a></li>
                        </ul>
                    </div>
                </div>
                <nav class="navbar navbar-dark bg-dark">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                </nav>
            </div>
            <!--Responsive navbar--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
            <nav class="menu">

            </nav>
        </header>