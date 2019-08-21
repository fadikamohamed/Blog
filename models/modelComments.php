<?php

class Comments {

    public $id;
    public $name;
    public $comment;
    public $idArticle;
    public $idPicture;

    public function __construct()
    {
        $connection = SingletonClass::getInstance();
        $this->pdo = $connection->pdo;
    }

    public function addArticleComment()
    {
        $query = 'INSERT INTO `comments`(`name`, `comment`, `id_articles`, `addingDate`) VALUES (:name, :comment, :idArticle, NOW())';
        $addComment = $this->pdo->prepare($query);
        $addComment->bindValue(':name', $this->name, PDO::PARAM_STR);
        $addComment->bindValue(':comment', $this->comment, PDO::PARAM_STR);
        $addComment->bindValue(':idArticle', $this->idArticle, PDO::PARAM_INT);
        $result = $addComment->execute();
        if ($result)
        {
                return $result;
            
        }
    }
    
    public function getCommentsByArticleId(){
        $query = 'SELECT `name`, `comment`, DATE_FORMAT(`addingDate`, \'Le : %d/%d/%Y à %Hh%i\') as `addingDate` FROM `comments` WHERE `id_articles`=:idArticle ORDER BY `addingDate` DESC';
        $getComment = $this->pdo->prepare($query);
        $getComment->bindValue(':idArticle', $this->idArticle, PDO::PARAM_INT);
        $getComment->execute();
        $result = $getComment->fetchAll(PDO::FETCH_OBJ);
        if (is_array($result))
        {
            return $result;
        }
    }
    
    public function getComments(){
        $query = 'SELECT `atc`.`id` as `idArticle`, `cmts`.`name` as `name`, `cmts`.`comment` as `comment`, DATE_FORMAT(`cmts`.`addingDate`, \'Le : %d/%d/%Y à %Hh%i\') as `addingDate`, `atc`.`title` as `title` FROM `comments` as `cmts`'
                . 'INNER JOIN `articles` as `atc` ON `atc`.`id` = `cmts`.`id_articles` ORDER BY `addingDate` DESC';
        $getComments = $this->pdo->query($query);
        $result = $getComments->fetchAll(PDO::FETCH_OBJ);
        if (is_array($result))
        {
            return $result;;
        }
    }

}
