<div class="container col-md-12 mt-5">
    <div class="">
        <h2 class="title">Album photo</h2>
        <!-- Top content -->
        <div class="carousel">

            <?php
            $i = 1;
            foreach ($picturesList as $picture)
            {
                ?>
                <div class="">
                    <img id="<?= $picture->id ?>" src="<?= $picture->path ?>" class="img-fluid d-block carouselImg mx-auto" alt="img<?= $picture->id ?>" onclick="startLightBox(<?= $picture->id ?>)" />
                </div>
                <?php
            }
            ?>
        </div>
        <div id="lightBoxBg" onclick="dismiss()">
        </div>
        <div class="shadow-lg mb-5 rounded row justify-content-center" id="lightBox">
        </div>
        <hr>
        <!--Articles--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
        <div class="row justify-content-center">
            <div class="contentHomePage">
                <h2 class="articleTitles m-5">Derniers articles</h2>

                <?php
                $i = 1;
                foreach ($articleData as $article)
                {
                    if ($i == 1)
                    {
                        ?>
                        <div class="row justify-content-left">
                            <a class="homePArticles" href="index.php?page=articles&pageArticle=<?= $article->id ?>">
                                <div id="card" class="card m-4 shadow-lg mb-5 rounded col-lg-12 col-md-8 col-sm-6">
                                    <img class="card-img-top p-3" src="<?= $article->picture ?>" alt="<?= $article->title ?>">
                                    <div class="card-body">
                                        <h5 class="articleTitles card-title"><?= $article->title ?></h5>
                                        <p class="card-text"><?= $article->resume ?></p>
                                    </div>
                                    <div class="card-body">
                                        <p class="articleDate card-text"><?= $article->addingDate ?></p>
                                        <!--                <a href="#" class="card-link">Card link</a>
                                                        <a href="#" class="card-link">Another link</a>            -->
                                    </div>
                                </div>
                            </a>
                        </div>
                        <?php
                    }
                    elseif ($i > 1 && $i < 5)
                    {
                        ?>                
                        <div class="cardBox row justify-content-left">
                            <a class="homePArticles" href="index.php?page=articles&pageArticle=<?= $article->id ?>">
                                <div id="card" class="card m-4 shadow-lg mb-5 rounded cardSm  col-lg-12 col-md-6 col-sm-6">
                                    <div class="row">
                                        <img class="articleImg card-img-top col-md-4 p-3" src="<?= $article->picture ?>" alt="<?= $article->title ?>">
                                        <div class="cardText col-md-8">
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
                    $i++;
                }
                ?>
                <div class="m-5">
                    <a href="index.php?page=articles" class="">Voir tous les articles <img src="assets/img/icons/icons8-avance-26.png"></a>
                </div>

            </div>

