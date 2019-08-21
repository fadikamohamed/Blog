$(function () {
    $('.deleteArticle').click(function () {
        var idArticle = $(this).attr('id');
        $('#fmodal').append('<p>Etes vous certaine de vouloir supprimer cet article ?</p><p class="text-danger">Cette action est irréverssible !</p>');
        $('#fmodal').dialog({
            position: {
                my: 'center center',
                at: 'center middle',
                of: window
            },
            buttons: [
                {
                    text: 'Oui',
                    click: function () {
                        console.log(idArticle);
                        $.post(
                                'controllers/controllerAdmin.php',
                                {
                                    idArticleToDelete: idArticle
                                },
                                result,
                                'text',
                                );
                        function result(response) {
                            $('#fmodal').dialog('close');
                            $('#fmodal').empty();
                            $('#fmodal').append(response);
                            $('#fmodal').dialog({
                                position: {
                                    my: 'center center',
                                    at: 'center middle',
                                    of: window
                                },
                                buttons: [
                                    {
                                        text: 'OK',
                                        click: function () {
                                            location.reload();
                                        }
                                    }
                                ]
                            });
                        }
                    }
                },
                {
                    text: 'Non',
                    click: function () {
                        location.reload();
                    }
                }
            ]
        });


    });
});