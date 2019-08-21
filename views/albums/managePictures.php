<?php
if (!isset($_GET['album']) || !is_numeric($_GET['album']))
{
    ?>
    <!-- Liste des Albums --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------->
    <table border="1">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Renommer</th>
                <th>Supprimer</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($albumsList as $list)
            {
                ?>
                <tr>
                    <td><a href="index.php?page=admin&tab=pictures&subTab=managePictures&album=<?= $list->id ?>"><?= $list->name ?></a></td>
                    <td><button type="button" class="btn btn-primary">Renomer</button></td>
                    <td><button type="button" class="btn btn-danger">Supprimer</button></td>
                </tr>
            <?php } ?>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>
    <?php
}
elseif (isset($_GET['album']) && is_numeric($_GET['album']))
{
    ?>
    <!-- Gallerie photo ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------>
    <p><a href="index.php?page=admin&tab=pictures&subTab=managePictures">retour</a></p>
        <?= isset($_SESSION['testImg']) ? $_SESSION['testImg'] : null ?>
    <div  class="shadow-lg mb-5 rounded">
        <div class="row justify-content-center">
            <?php
            foreach ($pictureList as $picture)
            {
                ?>
                <div class="">
                    <p><img class="galleryImg mr-5 ml-5 " id="<?= $picture->id ?>" src="<?= $picture->path ?> " onclick="startLightBox(<?= $picture->id ?>)" /><p>
                    <p><button class="pictureButton bg-danger" >Supprimer</button></p>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
    <div id="lightBoxBg" onclick="dismiss()">
    </div>
    <div class="shadow-lg mb-5 rounded row justify-content-center" id="lightBox">
    </div>
<?php }
?>
