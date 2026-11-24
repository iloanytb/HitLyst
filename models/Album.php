<?php
class Album
{
    private $db;


    public function _construct()
    {
        $this -> db = Database::getInstance();
    }
    public function getAllAlbums()
    {
        $connexion = $this ->db ->getConnexion();
        $req = "SELECT* FROM album";
        $cmd = $connexion ->prepare($req);
        $cmd ->execute();
        return $cmd->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getAlbumById($id)
    {
        $connexion = $this ->db ->getConnexion();
        $req = "SELECT * FROM album WHERE id=:id";
        $cmd = $connexion->prepare($req);
        $cmd->bindParam(':id', $id, PDO::PARAM_INT);
        $cmd->execute();
        return $cmd->fetch(PDO::FETCH_ASSOC);
    }
    public function getAlbumByNom($nom)
    {
        $connexion = $this ->db ->getConnexion();
        $req = "SELECT * FROM album WHERE nom=:nom";
        $cmd = $connexion->prepare($req);
        $cmd->bindParam(':nom', $nom, PDO::PARAM_STR);
        $cmd->execute();
        return $cmd->fetch(PDO::FETCH_ASSOC);
    }
    public function getAlbumByDateSortie($date_sortie)
    {
        $connexion = $this ->db ->getConnexion();
        $req = "SELECT * FROM album WHERE date_sortie=:date_sortie";
        $cmd = $connexion->prepare($req);
        $cmd->bindParam(':date_sortie', $date_sortie, PDO::PARAM_STR);
        $cmd->execute();
        return $cmd->fetch(PDO::FETCH_ASSOC);
    }
    public function getAlbumByArtisteId($artiste_id)
    {
        $connexion = $this ->db ->getConnexion();
        $req = "SELECT * FROM album WHERE artiste_id=:artiste_id";
        $cmd = $connexion->prepare($req);
        $cmd->bindParam(':artiste_id', $artiste_id, PDO::PARAM_INT);
        $cmd->execute();
        return $cmd->fetchAll(PDO::FETCH_ASSOC);
    }
}