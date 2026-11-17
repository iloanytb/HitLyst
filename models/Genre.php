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
        $stmt = $connexion->prepare($req);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getGenreById($id)
    {
        $connexion = $this->db->getConnexion();
        $req = "SELECT * FROM genre WHERE id = :id";
        $stmt = $connexion->prepare($req);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function getGenreByNom($nom)
    {
        $connexion = $this->db->getConnexion();
        $req = "SELECT * FROM genre WHERE nom = :nom";
        $stmt = $connexion->prepare($req);
        $stmt->bindParam(':nom', $nom, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}