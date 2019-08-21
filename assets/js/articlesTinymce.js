$(function () {
    //Au clic sur le bouton ayant l'id #newArticleSubmit
    $('#newArticleSubmit').click(function () {
        //Lancer la fonction Ajax
        $.post(
            'controllers/controllerArticlesTinymce.php',
            {
                articleInput: $('#newArticle').val()
            },
            function result(response) {
                $('#response').empty();
                $('#response').append(response);
        }),
            'text'
            
    });
});