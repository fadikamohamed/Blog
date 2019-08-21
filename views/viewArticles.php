<div class="container col-md-12 mt-5">
    <div class="row justify-content-center">
        <div class="articleContent col-md-offset-1 col-md-7 mb-5">
            <?php
            if (!isset($_GET['pageArticle']))
            {
                ?>                
                <h2 class="articleTitles m-5">Tout les articles</h2>

                <?php
                foreach ($articlesList as $article)
                {
                    ?>
                    <div class="cardBox row justify-content-left">
                        <a href="index.php?page=articles&pageArticle=<?= $article->id ?>">
                            <div id="card" class="card m-4 shadow-lg mb-5 rounded cardSm" style="width: 65rem;">
                                <div class="row">
                                    <img class="articleImg card-img-top col-md-4 p-3" src="<?= $article->picture ?>" alt="<?= $article->title ?>">
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="articleTitles card-title"><?= $article->title ?></h5>
                                            <p class="card-text"><?= $article->resume ?></p>
                                        </div>
                                        <hr>
                                        <div class="card-body">
                                            <p class="articleDate card-text"><?= $article->addingDate ?></p>
                                            <!--                <a href="#" class="card-link">Card link</a>
                                                            <a href="#" class="card-link">Another link</a>            -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php
                }
            }
            elseif (isset($_GET['pageArticle']) && is_numeric($_GET['pageArticle']))
            {
                if (!empty($articleData->article))
                {
                    echo $articleData->article;
                }
                ?>
                <hr class="m-5 pt-5">
                <h3>Ajouter un commentaire</h3>
                <?php
                if (isset($formSuccess['addComment']))
                {
                    ?>
                    <p class="text-success"><?= $formSuccess['addComment'] ?></p>
                <?php } ?>
                <form action="#" method="POST">
                    <div class="form-group row justify-content-center mt-5">
                        <label for="" class="col-md-2">Votre nom : </label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" name="commentName">
                        </div>
                        <div class="col-md-12">
                            <?php
                            if (isset($formError['commentName']))
                            {
                                ?>
                                <p class="text-danger"><?= $formError['commentName'] ?></p>
                            <?php } ?>
                        </div>
                    </div>
                    <div class="form-group row justify-content-center mt-5">
                        <label for="" class="col-md-2">Votre commentaire : </label>
                        <div class="col-md-6">
                            <textarea name="commentText"></textarea>
                        </div>
                        <div class="col-md-12">
                            <?php
                            if (isset($formError['commentText']))
                            {
                                ?>
                                <p class="text-danger"><?= $formError['commentText'] ?></p>
                            <?php } ?>
                        </div>
                    </div>
                    <input type="submit" name="addComment" value="Envoyer"/>
                </form>
                <hr class="m-5">
                <div class="commentStyle">

                <h3 class="">Derniers commentaires</h3>
                <?php
                if (isset($commentsData))
                {

                    foreach ($commentsData as $commentList)
                    {
                        ?>
                        <hr class="">
                        <div class="">
                            <p class="">De : <?= $commentList->name ?></p>
                            <p><?= $commentList->comment ?></p>
                            <p><?= $commentList->addingDate ?></p>
                        </div>
                        <?php
                    }
                }?>
                    </div>
            <?php }
            else
            {
                ?>
                <p>Aucun commantaire</p>
            <?php }
            ?>
        </div>

