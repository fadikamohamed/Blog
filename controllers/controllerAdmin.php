<?php

if (!session_id())
{
    require_once '../configuration.php';
}

function admin()
{
    $_SESSION['dropzone'] = false;
    //    $_SESSION['idAlbum'] = NULL;
    //Ajout des articles ---------------------------------------------------------------------------------------------------------------------------------
    if (isset($_POST['articleSubmit']))
    {
        
        $article = NEW Articles();
        $formError = array();
        if (!empty($_POST['title']))
        {
            $title = htmlspecialchars($_POST['title']);
            if (preg_match('/./', $title))
            {
                $article->title = $title;
            }
            else
            {
                $formError['title'] = 'Veillez a n\'utiliser que les caracteres autorisé !';
            }
        }
        else
        {
            $formError['title'] = 'Vous n\'avez pas choisis titre pour votre article';
        }
        
        if (!empty($_FILES['picture']))
        {
            $directory = 'assets/img/miniatures/' . $_FILES['picture']['name'];
            $article->picture = $directory;
        }
        else
        {
            $formError['picture'] = 'Vous n\'avez pas choisis d\'image pour la miniature';
        }
        
        if (!empty($_POST['resume']))
        {
            $resume = htmlspecialchars($_POST['resume']);
            if (preg_match('/./', $resume))
            {
                $article->resume = $resume;
            }
            else
            {
                $formError['resume'] = 'Veillez a n\'utiliser que les caracteres autorisé !';
            }
        }
        else
        {
            $formError['resume'] = 'Vous n\'avez pas choisis de résumé pour votre article';
        }
        
        //Si la variable superglobal $_POST['article'] n'est pas vide    
        if (!empty($_POST['article']))
        {
            //Désactivation des balises qu'elle contient et intégration dans la variable $newArticle
            $newArticle = $_POST['article'];
            if (preg_match('/./', $newArticle))
            {
                //Hydratation de l'attribut $article de l'instance $addArticle avec la valeur de la variable $newArticle
                $article->article = $newArticle;
            }
            else
            {
                $formError['article'] = 'Veillez a n\'utiliser que les caracteres autorisé !';
            }
            //Sinon    
        }
        else
        {
            //Afficher messsage
            $formError['article'] = 'Vous n\'avez pas saisi de text pour votre article';
        }
        //        var_dump($_POST);
        if (count($formError) == 0)
        {
            var_dump($_FILES);
            //Éxécution de la méthode addArticle() de l'instance addArticle et intégration du résultat dans la variable $result
            $result = $article->addArticle();
            //Si $result est égale a true
            if ($result)
            {
                //Afficher messsage
                $formSuccess['article'] = 'Bingo';
                $addMiniature = move_uploaded_file($_FILES['picture']['tmp_name'], $directory);
                //Sinon
            }
            else
            {
                //Afficher messsage
                $formSuccess['article'] = 'Les données n\'ont pas été enregistré dans la base de donnée';
            }
        }
    }
    
    
    
    //Gestion des articles ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    
    if (isset($_GET['subTab']) && $_GET['subTab'] == 'management')
    {
        $articles = NEW Articles();
        $listArticles = $articles->getManageArticles();
    }
    
    
    //Modification des articles ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
    
    
    if (isset($_POST['articleUpdateSubmit']))
    {   //Déclaration de l'instance $article de l'objet Article()
        $article = NEW Articles();
        $picture = NEW Articles();
        //Déclaration du $formError
        $formError = array();
        //Si $_POST['title'] n'est pas vide
        if (!empty($_POST['title']))
        {
            $title = htmlspecialchars($_POST['title']);
            //Hydratation de l'attribut $title de l'instance $article avec la valeur de $title
            $article->title = $title;
        }
        else
        {
            $formError['title'] = 'Vous n\'avez pas choisis titre pour votre article';
        }
        
        if (!empty($_FILES['picture']) && $_FILES['picture']['name'] != '')
        {
            $directory = 'assets/img/miniatures/' . $_FILES['picture']['name'];
            $article->picture = $directory;
            var_dump($_FILES['picture']);
        }
        elseif (!empty($_FILES['picture']) && $_FILES['picture']['name'] == '')
        {
            var_dump($_FILES['picture']);
            $picture->id = $_SESSION['articleId'];
            $picture = $picture->getPictureById();
            $article->picture = $picture->picture;
        }
        
        if (!empty($_POST['resume']))
        {
            $resume = htmlspecialchars($_POST['resume']);
            $article->resume = $resume;
        }
        else
        {
            $formError['resume'] = 'Vous n\'avez pas choisis de résumé pour votre article';
        }
        
        //Si la variable superglobal $_POST['article'] n'est pas vide    
        if (!empty($_POST['article']))
        {
            //Désactivation des balises qu'elle contient et intégration dans la variable $newArticle
            $newArticle = $_POST['article'];
            //Hydratation de l'attribut $article de l'instance $addArticle avec la valeur de la variable $newArticle
            $article->article = $newArticle;
            //Sinon    
        }
        else
        {
            //Afficher messsage
            $formError['article'] = 'Vous n\'avez pas saisi de text pour votre article';
        }
        //        var_dump($_POST);
        if (count($formError) == 0)
        {
            var_dump($_FILES);
            $articleId = htmlspecialchars($_GET['articleId']);
            $article->id = $articleId;
            //Éxécution de la méthode addArticle() de l'instance addArticle et intégration du résultat dans la variable $result
            $result = $article->updateArticle();
            //Si $result est égale a true
            if ($result)
            {
                //Afficher messsage
                $formSuccess['article'] = 'Bingo';
                if (!empty($_FILES['picture']) && $_FILES['picture']['name'] != '')
                {
                    $addMiniature = move_uploaded_file($_FILES['picture']['tmp_name'], $directory);
                    if ($addMiniature)
                    {
                        //                        $picture = $picture->getPictureById();
                        //                        unlink($picture->picture);
                    }
                }
                //Sinon
            }
            else
            {
                //Afficher messsage
                $formError['updateArticle'] = 'Les données n\'ont pas été enregistré dans la base de donnée';
            }
        }
    }
    
    if (isset($_GET['subTab']) && $_GET['subTab'] == 'update')
    {   //Si l'id contenu dans $_GET['articleId] est au format numérique
        if (is_numeric($_GET['articleId']))
        {   //Déclaration de l'instance $article de l'objet Articles()
            $article = NEW Articles();
            //Déclaration de l'instance $picture de l'objet Articles()
            $picture = NEW Articles();
            $articleId = htmlspecialchars($_GET['articleId']);
            //hydratation de l'attribut $id de l'instance $picture
            $picture->id = $articleId;
            //hydratation de l'attribut $id de l'instance $article avec la valeur de $articleId
            $article->id = $articleId;
            //Récupération des données de l'article dans la variable $getData
            $getData = $article->getArticleById();
            $_SESSION['articleId'] = $getData->id;
            var_dump($getData);
        }
        else
        {
            $formError['idMissing'] = 'Aucun article trouvé. Érreur d\'identification !';
        }
    }
    
    //Ajout des Photos ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------|
    if (!empty($_POST['newAlbum']))
    {
        //Création d'un nouvel album -----------------------------------------------------------------------------------------------------------------------------------------------
        $newAlbum = htmlspecialchars($_POST['newAlbum']);
        $albumPath = 'assets/album/';
        $addNewAlbum = new Albums();
        $addNewAlbum->name = $newAlbum;
        $addNewAlbum->location = $albumPath;
        $idAlbum = $addNewAlbum->newAlbum();
        $idAlbum = $idAlbum->id;
        if (mkdir($albumPath . $idAlbum, 0777))
        {
            if (is_numeric($idAlbum))
            {
                $formSucces['newAlbum'] = 'L\'album a été créé avec succes';
            }
        }
        else
        {
            $formError['newAlbum'] = 'L\'album n\'a pas pu etre créé';
        }
    }
    
    //Récupération de la liste des albums -------------------------------------------------------------------------------------------------------------------------------------|
    
    if (isset($_GET['tab']) && $_GET['tab'] == 'pictures')
    {
        $getAlbums = new Albums();
        $albumsList = $getAlbums->getAlbums();
        $_SESSION['dropzone'] = true;
        
        
        if (!empty($_GET['album']) && is_numeric($_GET['album']))
        {
            $idAlbum = $_GET['album'];
            $getAlbums->id = $idAlbum;
            $albumData = $getAlbums->getAlbumById();
            $location = $albumData->location . $idAlbum . '/';
            
            $albumToRead = opendir($location);
        }
    }
    
    //Afficher les image de l'album ----------------------------------------------------------------------------------------------------------------
    
    if (isset($_GET['album']) && is_numeric($_GET['album']))
    {
        $getPictures = new Pictures();
        $getPictures->idAlbums = $_GET['album'];
        $pictureList = $getPictures->getPicturesByAlbumId();
    }
    
    
    
    require_once 'views/viewAdmin.php';
}

//Ajout de nouvelles photos dans un album -----------------------------------------------------------------------------------------------------------------------------|
//if (!empty($_GET['subTab']) && $_GET['subTab'] == 'addPictures')
//{
    if (!empty($_FILES) && $_SESSION['dropzone'] == true)
    {
        $tempFile = $_FILES['file']['tmp_name'];
        $idAlbum = $_SESSION['idAlbum'];
        $addPictures = new Albums();
        $addPictures->id = $idAlbum;
        $albumData = $addPictures->getAlbumById();
        $albumPath = '../' . $albumData->location . $albumData->id . '/' . $_FILES['file']['name'];
        $pathForShow = $albumData->location . $albumData->id . '/' . $_FILES['file']['name'];
        $imgSize = getimagesize($_FILES['file']['tmp_name']);
        $_SESSION['testImg'] = $imgSize;
        
        if (move_uploaded_file($tempFile, $albumPath))
        {
            $_SESSION['albumPath'] = $albumPath;
            $addPicture = new Pictures();
            $addPicture->path = $pathForShow;
            $addPicture->idAlbums = $idAlbum;
            $addPicture->imgWidth = $imgSize[0];
            $addPicture->imgHeight = $imgSize[1];
            $addPicture->imgType = $imgSize[2];
            $result = $addPicture->addPictures();
            if ($result)
            {
                $_SESSION['addPictureResult'] = $result;
            }
        }
    }
    //}
    //Affichage du dropzone avec Ajax ----------------------------------------------------------------------------------------------------------------------------------
    
    if (!empty($_POST['idAlbum']))
    {
        
        if (is_numeric($_POST['idAlbum']))
        {
            $idAlbum = $_POST['idAlbum'];
            $_SESSION['idAlbum'] = $idAlbum;
        }
    }
    
    //Suppréssion d'articles avec ajax -------------------------------------------------------------------------------------------------------------------------------------
    
    if (!empty($_POST['idArticleToDelete']))
    {
        $idArticleToDelete = $_POST['idArticleToDelete'];
        if (is_numeric($idArticleToDelete))
        {
            $deleteArticle = new Articles();
            $deleteArticle->id = $idArticleToDelete;
            $result = $deleteArticle->deleteArticleBYId();
            if ($result)
            {
                echo '<p class="text-success">L\'article sélectionné a bien été supprimé !</p>';
            }
            else
            {
                echo '<p class="text-danger">Une érreur empeche la suppréssion de l\'article !</p>';
            }
        }
    }
    //Supprimer les photos d'un album ------------------------------------------------------------------------------------------------------------------------------------------------------------
    
    if (isset($_POST['deletePicturesSubmit']))
    {
        if (!empty($_POST['deletePictures']))
        {
            
        }
    }
    ?>