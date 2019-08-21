<h3>Créer un nouvel album</h3>
<form action="#" method="post">
    <?php if (isset($formSucces['newAlbum']))
    {
        ?>
        <p><?= $formSucces['newAlbum'] ?></p>
    <?php }
    ?>
    <div class="form-group row justify-content-center mt-5">
        <label for="" class="col-md-2">Nom du nouvel album : </label>
        <div class="col-md-3">
            <input type="text" class="form-control" name="newAlbum"/>
        </div>
        <input type="submit"  class="form-control col-md-1"  value="Créer"  name="Créer"/>
    </div>
    <?php if (isset($formError['newAlbum']))
    {
        ?>
        <p><?= $formError['newAlbum'] ?></p>
<?php } ?>
</form>
<hr class="">
<!-- Selection de l'album ------------------------------------------------------------------------------------------------------------------------------------------------- -->
<form action="action">
    <div class="form-group row justify-content-center mt-5">
    <select id="albumList" name="album" onchange="showHideDropZone()">
        <option value="0" >Selectionnez un album</option>
        <?php
        foreach ($albumsList as $list)
        {
            ?>
            <option value="<?= $list->id ?>" ><?= $list->name ?></option>
<?php }
?>
    </select>
        </div>
</form>
<?= var_dump($_SESSION) ?>
<?= var_dump($_SESSION['addPictureResult']) ?>
<div class="" id="dropzone">
    <hr class="">
    <!-- Zone de drop -------------------------------------------------------------------------------------------------------------------------------------------------------- -->
    <?= isset($_SESSION['f']) ? $_SESSION['f'] : NULL ?>
    <h3>Faite glisser les images dans la zone de drope ou cliquez dessus</h3>
    <form action="controllers/controllerAdmin.php" class="dropzone">
    </form>
</div>
<div id="fmodal">

</div>