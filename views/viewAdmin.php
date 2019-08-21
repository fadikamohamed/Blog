<div class="pageCorp">
    <nav class="navBarAdmin">
        <ul>
            <li><a href="index.php?page=admin&tab=articles">Articles</a></li>
            <li><a href="index.php?page=admin&tab=pictures">Album photos</a></li>
            <li><a href="">Concours</a></li>
        </ul>
    </nav>
    <?php
    if (isset($_GET['tab']))
    {






// Articles ---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
        if ($_GET['tab'] == 'articles')
        {
            ?>
            <div class="subNavBarAdmn">
            <ul>
                <li><a href="index.php?page=admin&tab=articles&subTab=newArticle">Nouvel article</a></li>
                <li><a href="index.php?page=admin&tab=articles&subTab=management">Gérer les articles</a></li>
            </ul>
            </div>
            <hr class="bg-black">


            <?php
            if (isset($_GET['subTab']) && $_GET['subTab'] == 'newArticle')
            {
//                Nouvel  article  -----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
                require_once 'views/articles/addArticles.php';
            }
            elseif (isset($_GET['subTab']) && ($_GET['subTab'] == 'management'))
            {
//                Gestion des articles ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
                require_once 'views/articles/manageArticles.php';
            }
            elseif (isset($_GET['subTab']) && $_GET['subTab'] == 'update')
            {
//                Modification d'article -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
                require_once 'views/articles/updateArticles.php';
            }
        }


// Album photo --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
        elseif ($_GET['tab'] == 'pictures')
        {
            ?>
            <div class="subNavBarAdmn">
            <ul>
                <li><a href="index.php?page=admin&tab=pictures&subTab=addPictures">Ajouter des photos</a></li>
                <li><a href="index.php?page=admin&tab=pictures&subTab=managePictures">Gérer les photos</a></li>
            </ul>
            </div>
            <hr class="bg-black">

            <?php
            if (isset($_GET['subTab']) && $_GET['subTab'] == 'addPictures')
            {
//                Nouveaux albums ----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
                require_once 'views/albums/addPictures.php';
            }
            elseif (isset($_GET['subTab']) && $_GET['subTab'] == 'managePictures')
            {
//                Gestion des albums -----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
                require_once 'views/albums/managePictures.php';
            }
        }
    }
    ?>

</div>