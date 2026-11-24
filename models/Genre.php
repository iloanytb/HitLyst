<?php
class Genre 
{
    private $db;

    public function _construct()
    {
        $this -> db = Database::getInstance();
    }
    public function getAllGenres()
    {
        $connexion = $this->db->getConnexion();
        $req = "SELECT * FROM genre";
        $cmd = $connexion->prepare($req);
        $cmd->execute();
        return $cmd->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getGenreById($id)
    {
        $connexion = $this->db->getConnexion();
        $req = "SELECT * FROM genre WHERE id = :id";
        $cmd = $connexion->prepare($req);
        $cmd->bindParam(':id', $id, PDO::PARAM_INT);
        $cmd->execute();
        return $cmd->fetch(PDO::FETCH_ASSOC);
    }
    public function getGenreByNom($nom)
    {
        $connexion = $this->db->getConnexion();
        $req = "SELECT * FROM genre WHERE nom = :nom";
        $cmd = $connexion->prepare($req);
        $cmd->bindParam(':nom', $nom, PDO::PARAM_STR);
        $cmd->execute();
        return $cmd->fetch(PDO::FETCH_ASSOC);
    }
}