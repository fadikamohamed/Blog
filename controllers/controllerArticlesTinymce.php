<?php 
//Si l'id de session n'existe pa
if (!session_id()) {
    //Appele du fichier de configuration
    require_once '../configuration.php';
}
//Si la variable superglobal $_POST['articleInput'] n'est pas vide    
if (!empty($_POST['articleInput'])) {
    //Désactivation des balises qu'elle contient et intégration dans la variable $newArticle
    $newArticle = $_POST['articleInput'];
    //Déclaration de l'instance $addArticle de l'objet Article()
    $addArticle = new Articles();
    //Hydratation de l'attribut $article de l'instance $addArticle avec la valeur de la variable $newArticle
    $addArticle->article = $newArticle;
    //Éxécution de la méthode addArticle() de l'instance addArticle et intégration du résultat dans la variable $result
    $result = $addArticle->addArticle();
    //Si $result est égale a true
    if ($result) {
        //Afficher messsage
        $formError['article'] = 'Bingo';
        echo '<p class="success">Bingo</p>';
        //Sinon
    } else {
        //Afficher messsage
        $formError['article'] = 'Les données n\'ont pas été enregistré dans la base de donnée';
        echo '<p class="error">Les données n\'ont pas été enregistré dans la base de donnée</p>';
    }
    //Sinon    
} else {
    //Afficher messsage
    $formError['article'] = 'Les données n\'ont pas été envoyé';
    echo '<p class="error">Les données n\'ont pas été envoyé</p>';
}