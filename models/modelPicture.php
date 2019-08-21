<?php

class Pictures {

    public $id;
    public $path;
    public $idAlbums;
    public $imgWidth;
    public $imgHeight;
    public $imgType;

    public function __construct()
    {
        $connection = SingletonClass::getInstance();
        $this->pdo = $connection->pdo;
    }
    
    public function addPictures(){
        $query = 'INSERT INTO `pictures`(`path`, `addingDate`,  `id_albums`, `width`, `height`, `type`) VALUES (:path, NOW(), :idAlbums, :imgWidth, :imgHeight, :imgType)';
        $addPicture = $this->pdo->prepare($query);
        $addPicture->bindValue(':path', $this->path, PDO::PARAM_STR);
        $addPicture->bindValue(':idAlbums', $this->idAlbums, PDO::PARAM_INT);
        $addPicture->bindValue(':imgWidth', $this->imgWidth, PDO::PARAM_INT);
        $addPicture->bindValue(':imgHeight', $this->imgHeight, PDO::PARAM_INT);
        $addPicture->bindValue(':imgType', $this->imgType, PDO::PARAM_INT);
        $resut = $addPicture->execute();
        if ($resut)
        {
            return $resut;
        }
    }
    
    public function getPicturesByAlbumId(){
        $query = 'SELECT `id`, `path` FROM `pictures` WHERE `id_albums`=:idAlbums';
        $getPictures = $this->pdo->prepare($query);
        $getPictures->bindValue(':idAlbums', $this->idAlbums, PDO::PARAM_INT);
        $getPictures->execute();
        $result = $getPictures->fetchAll(PDO::FETCH_OBJ);
        if (is_array($result))
        {
            return $result;
        }
    }
    
    public function getAllPictures(){
        $query = 'SELECT `id`, `path`, `id_albums` FROM `pictures` ORDER BY `addingDate` DESC';
        $getPictures = $this->pdo->query($query);
        $result = $getPictures->fetchAll(PDO::FETCH_OBJ);
        if (is_array($result))
        {
            return $result;
        }
    }
}
