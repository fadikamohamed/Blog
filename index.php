<?php
require_once "views/header.php";
require 'routing.php';
if (!isset($_GET['page']) || $_GET['page'] != 'admin')
{
    ?>
    <div class="sideBarLeft col-md-2">
        <h3 class="m-5">Derniers commentaires</h3>
        <?php
        foreach ($allCommentsList as $comments)
        {
            ?>
            <div class="">
                <hr class="">
                <p>De : <?= $comments->name ?></p>
                <p class=""><?= $comments->comment ?></p>
                <p class="dateComments"><?= $comments->addingDate ?></p>
                <p class="articleTitleComment"><a href="index.php?page=articles&pageArticle=<?= $comments->idArticle ?>">Article : <?= $comments->title ?></a></p>
            </div>
        <?php }
        ?>
    </div>
    </div>
    </div>
<?php } ?>
<hr class="">
<div id="footer" class="footer row justify-content-center pt-3">
    <p class="text-white align-center">@CopyrightByOctavius</p>
</div>







<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script type="text/Javascript" src="assets/js/articlesTinymce.js"></script>
<script src="assets/css/bootstrap/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.js"></script>
<script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src='assets/js/tinymce/js/tinymce/tinymce.min.js'></script>
<script src="https://rawgit.com/enyo/dropzone/master/dist/dropzone.js"></script>
<script src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="assets/js/scripts.js"></script>
<script src="assets/js/lightBox.js"></script>
<script src="assets/js/pictureAlbum.js"></script>
<script src="assets/js/deleteArticles.js"></script>
<script src="assets/js/wow.js"></script>
<script src="assets/js/responsive.js"></script>

<script>
    tinymce.init({
        selector: 'textarea#newArticle',
        height: 500,
        plugins: [
            "advlist autolink lists link image charmap print preview anchor",
            "searchreplace visualblocks code fullscreen",
            "insertdatetime media table contextmenu paste imagetools wordcount",
            "emoticons",
            "media",
            "fullpage",
            "quickbars",
            "fullscreen",
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | emoticons | media fullpage forecolor backcolor fullscreen",
        media_url_resolver: function (data, resolve/*, reject*/) {
            if (data.url.indexOf('YOUR_SPECIAL_VIDEO_URL') !== -1) {
                var embedHtml = '<iframe src="' + data.url +
                        '" width="400" height="400" ></iframe>';
                resolve({html: embedHtml});
            } else {
                resolve({html: ''});
            }
        },
        // imagetools_cors_hosts: ['www.tinymce.com', 'codepen.io'],
        content_css: [
            '//fonts.googleapis.com/css?family=Lato:300,300i,400,400i',
            '//www.tinymce.com/css/codepen.min.css'
        ]
    });
</script> 
</body>
</html>