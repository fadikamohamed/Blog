<?php

class Albums {

    public $id;
    public $name;
    public $location;

    public function __construct()
    {
        $connection = SingletonClass::getInstance();
        $this->pdo = $connection->pdo;
    }

    public function newAlbum()
    {
        $query = 'INSERT INTO `albums`(`name`, `location`) VALUE(:name, :location)';
        $newAlbum = $this->pdo->prepare($query);
        $newAlbum->bindValue(':name', $this->name, PDO::PARAM_STR);
        $newAlbum->bindValue(':location', $this->location, PDO::PARAM_STR);
        $result = $newAlbum->execute();
        if ($result)
        {
            $query = 'SELECT `id` FROM `albums` WHERE `name`=:name';
            $getId = $this->pdo->prepare($query);
            $getId->bindValue(':name', $this->name, PDO::PARAM_STR);
            $getId->execute();
            $result = $getId->fetch(PDO::FETCH_OBJ);
            if (is_object($result))
            {
                return $result;
            }
        }
    }

    public function getAlbumById()
    {
        $query = 'SELECT `id`, `name`, `location` FROM `albums` WHERE `id`=:id';
        $getAlbum = $this->pdo->prepare($query);
        $getAlbum->bindValue(':id', $this->id, PDO::PARAM_INT);
        $getAlbum->execute();
        $result = $getAlbum->fetch(PDO::FETCH_OBJ);
        return $result;
        if (is_object($result))
        {
            
        }
    }

    public function getAlbums()
    {
        $query = 'SELECT `id`, `name`, `location` FROM `albums`';
        $getAlbums = $this->pdo->query($query);
        $result = $getAlbums->fetchAll(PDO::FETCH_OBJ);
        if (is_array($result))
        {
            return $result;
        }
    }

}
