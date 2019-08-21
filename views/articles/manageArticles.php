<div class="container" id="manageArticle">
    <h3>Liste des articles</h3>
    <div class=" shadow-lg p-3 mb-5 rounded">
        <table id="manageArticleTable" class="table table-bordered bg-light">
            <thead>
                <tr>
                    <th scope="col">Miniature</th>
                    <th scope="col">Titre</th>
                    <th scope="col">Résumé</th>
                    <th scope="col">Date d'ajout</th>
                    <th scope="col">Derniere modification</th>
                    <th scope="col">Modifier</th>
                    <th scope="col">Supprimer</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($listArticles as $list)
                {
                    ?>
                <tr scope="row">
                        <td class="resizeTable"><a href="i"><img class="miniature" src="<?= $list->picture ?>" title="<?= $list->title ?>" alt="Image de manga" /></a></td>
                        <td class="resizeContentTable" title="<?= $list->title ?>" alt="Titre de l'article"><a href="index.php?page=admin&tab=articles&subTab=update&articleId=<?= $list->id ?>"><?= $list->title ?></a></td>
                        <td class="resizeContentTable" title="<?= $list->resume ?>" alt="Résumé de l'article"><p class="resume"><a href=""><?= $list->resume ?></a></p></td>
                        <td class="resizeTable" title="Date d'ajout de l'article" alt="Date d'ajout de l'article"<a href=""><?= $list->addingDate ?></a></td>
                        <td class="resizeTable" title="Date de la derniere modification de l'article" alt="Date de la derniere modification de l'article"><?= !empty($list->lastModifDate) ? $list->lastModifDate : null ?></td>
                        </a></td>
                        <td class="col-md-1" alt="Type du manga"><button type="button" class="btn btn-primary"><a href="index.php?page=admin&tab=articles&subTab=update&articleId=<?= $list->id ?>">Modifier</a></button></td>
                        <td class="col-md-1" alt="Type du manga"><button id="<?= $list->id ?>" type="button" class="deleteArticle btn btn-danger">Supprimer</button></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        <div id="fmodal">

        </div>
    </div>
</div>