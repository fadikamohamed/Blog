<div class="container">
                    <h3>Formulaire de modification d'article</h3>
                    <?php
                    if (isset($formSuccess['article']))
                    {
                        ?>
                        <p class="success"><?= $formSuccess['article'] ?></p>
                    <?php }
                    ?>
                    <form method="post" action="#" enctype="multipart/form-data">               
                        <div id="miniature">
                            <h4>Miniature</h4>


                            <!-- Titre -->
                            <div class="form-group row justify-content-center mt-5">
                                <label for="" class="col-md-1">Titre : </label>
                                <div class="col-md-4">
                                    <input type="text" class="form-control" name="title" value="<?= $getData->title ?>"/>
                                </div>
                                <?php
                                if (isset($formError['title']))
                                {
                                    ?>
                                    <p class="error"><?= $formError['title'] ?><p/>
                                <?php } ?>
                            </div>


                            <!-- Image -->
                            <div class="form-group row justify-content-center">
                                <label for="" class="col-md-1">Image : </label>
                                <div class="col-md-4">
                                    <input type="hidden" name="MAX_FILE_SIZE" value="50000000" />
                                    <input type="file" class="" name="picture" value="" />
                                </div>
                                <?php
                                if (isset($formError['picture']))
                                {
                                    ?>
                                    <p class="error"><?= $formError['picture'] ?><p/>
                                <?php } ?>
                            </div>


                            <!-- Résumé -->
                            <div class="form-group row justify-content-center mt-5">
                                <p>Résumé de l'article</p>    
                                <textarea class="newArticle text-dark" style="width:95%; height:150px;" name="resume"><?= $getData->resume ?></textarea>
                                <?php
                                if (isset($formError['resume']))
                                {
                                    ?>
                                    <p class="error"><?= $formError['resume'] ?><p/>
                                <?php } ?>
                            </div>                                      
                        </div>


                        <!-- Article -->
                        <div id="newArticleBox">     
                            <h4>Article</h4>
                            <div id="response"></div>
                            <?php
                            if (isset($formError['article']))
                            {
                                ?>
                                <p class="error"><?= $formError['article'] ?><p/>
                            <?php } ?>
                            <textarea id="newArticle" class="newArticle text-dark" name="article"><?= $getData->article ?></textarea>
                        </div>


                        <!-- bouton -->    
                        <button id="newArticleSubmit" type="submit" value="Poster" name="articleUpdateSubmit">Poster</button>
                    </form>
                </div>