<?php

function articles()
{
    $getArticlesList = NEW Articles();
    $articlesList = $getArticlesList->getArticles();

    if (isset($_GET['pageArticle']) && is_numeric($_GET['pageArticle']))
    {
        $idArticle = $_GET['pageArticle'];
        $getArticle = new Articles();
        $getArticle->id = $idArticle;
        $articleData = $getArticle->getArticleById();
       
        
        if (!empty($_POST['addComment']))
        {
            $formError = array();
            $addComment = new Comments();
            if (!empty($_POST['commentName']))
            {
                $commentName = htmlspecialchars($_POST['commentName']);
                $addComment->name = $commentName;
            }
            else
            {
                $formError['commentName'] = 'Vous devez entrer un nom pour votre commentaire avant de valider !';
            }
            if (!empty($_POST['commentText']))
            {
                $commentText = htmlspecialchars($_POST['commentText']);
                $addComment->comment = $commentText;
            }
            else
            {
                $formError['commentText'] = 'Vous devez entrer un commentaire avant de valider !';
            }

                var_dump($_POST);
            if (count($formError) == 0)
            {
                $addComment->idArticle = $idArticle;
                $result = $addComment->addArticleComment();
                if ($result)
                {
                    $formSuccess['addComment'] = 'Votre comentaire a été ajouté avec succes !';
                }
                else
                {
                    $formError['addComment'] = 'Votre Commentaire n\'a pas pu etre ajouté !';
                }
            }
        }
                $getComments = new Comments();
        $getComments->idArticle = $idArticle;
        $commentsData = $getComments->getCommentsByArticleId();
    }

    require_once 'views/viewArticles.php';
}

?>