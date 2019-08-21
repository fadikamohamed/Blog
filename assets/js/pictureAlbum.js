function showHideDropZone() {
    //Déclaration de la variable id contenant la valeur de la selection de d'album
    var id = $('#albumList').val();
    //Si l'id de l'album est différente de 0
    if (id != 0) {
        //Modification du style de la div dropzone pour la faire apparaitre a l'écran
        $('#dropzone').css('display', 'block');
        //Début de la fonction ajax aillant pour but d'introduire l'id de l'album dans une variable de session
        $.post(
                'controllers/controllerAdmin.php',
                {
                    idAlbum: id
                },
                result,
                'text'
                );
        function result(response) {
        }
    } else if (id == 0) {
        $('#dropzone').css('display', 'NONE');
    }

}