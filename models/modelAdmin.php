<?php

class Articles {

    private $pdo;
    public $id;
    public $title;
    public $picture;
    public $resume;
    public $article;

    public function __construct()
    {
        $connection = SingletonClass::getInstance();
        $this->pdo = $connection->pdo;
    }

    public function addArticle()
    {
        $query = 'INSERT INTO `articles`(`title`, `picture`, `resume`, `article`, `addingDate`) VALUES (:title, :picture, :resume, :article, NOW())';
        $addArticle = $this->pdo->prepare($query);
        $addArticle->bindValue(':title', $this->title, PDO::PARAM_STR);
        $addArticle->bindValue(':picture', $this->picture, PDO::PARAM_STR);
        $addArticle->bindValue(':resume', $this->resume, PDO::PARAM_STR);
        $addArticle->bindValue(':article', $this->article, PDO::PARAM_STR);
        $result = $addArticle->execute();
        if ($result)
        {
            return true;
        }
    }

    public function getManageArticles()
    {
        $query = 'SELECT `id`, `title`, `picture`, `resume`, `article`, DATE_FORMAT(`addingDate`, \'Le %d/%d/%Y à %Hh%i\') as `addingDate`, DATE_FORMAT(`lastModifDate`, \'Le %d/%d/%Y à %Hh%i\') as `lastModifDate` FROM `articles` ORDER BY `addingDate` DESC';
        $getArticles = $this->pdo->query($query);
        $result = $getArticles->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function getArticles()
    {
        $query = 'SELECT `id`, `title`, `picture`, `resume`, `article`, DATE_FORMAT(`addingDate`, \'Le %d/%d/%Y à %Hh%i\') as `addingDate` FROM `articles` ORDER BY `addingDate` DESC';
        $getArticles = $this->pdo->query($query);
        $result = $getArticles->fetchAll(PDO::FETCH_OBJ);
        if (is_array($result))
        {
            return $result;
        }
    }

    public function getArticleById()
    {
        $query = 'SELECT `id`, `title`, `picture`, `resume`, `article`, DATE_FORMAT(`addingDate`, \'Le %d/%d/%Y à %Hh%i\') as `addingDate` FROM `articles` WHERE `id`=:id';
        $getArticle = $this->pdo->prepare($query);
        $getArticle->bindValue(':id', $this->id, PDO::PARAM_INT);
        $getArticle->execute();
        $result = $getArticle->fetch(PDO::FETCH_OBJ);
        return $result;
    }

    public function getPictureById()
    {
        $query = 'SELECT `picture` FROM `articles` WHERE `id`=:id';
        $getPicture = $this->pdo->prepare($query);
        $getPicture->bindValue(':id', $this->id, PDO::PARAM_INT);
        $getPicture->execute();
        $result = $getPicture->fetch(PDO::FETCH_OBJ);
        return $result;
    }

    public function getLastArticles()
    {
        $query = 'SELECT `id`, `title`, `picture`, `resume`, `article`, DATE_FORMAT(`addingDate`, \'Le %d/%d/%Y à %Hh%i\') as `addingDate` FROM `articles` ORDER BY `addingDate` DESC LIMIT 0, 7';
        $getArticles = $this->pdo->query($query);
        $result = $getArticles->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function updateArticle()
    {
        $query = 'UPDATE `articles` SET `title`=:title, `picture`=:picture , `resume`=:resume, `article`=:article, `lastModifDate`=NOW() WHERE `id`=:id';
        $updateArticle = $this->pdo->prepare($query);
        $updateArticle->bindValue(':id', $this->id, PDO::PARAM_INT);
        $updateArticle->bindValue(':title', $this->title, PDO::PARAM_STR);
        $updateArticle->bindValue(':picture', $this->picture, PDO::PARAM_STR);
        $updateArticle->bindValue(':resume', $this->resume, PDO::PARAM_STR);
        $updateArticle->bindValue(':article', $this->article, PDO::PARAM_STR);
        $result = $updateArticle->execute();
        if ($result)
        {
            return $result;
        }
    }

    public function deleteArticleBYId()
    {
        $query = 'DELETE FROM `articles` WHERE `id`=:id';
        $idArticleToDelete = $this->pdo->prepare($query);
        $idArticleToDelete->bindValue(':id', $this->id, PDO::PARAM_INT);
        $result = $idArticleToDelete->execute();
        return $result;
    }

}

?>