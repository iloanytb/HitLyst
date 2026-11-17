<?php
class Favori
{
    private $db;

    public function _construct()
    {
        $this -> db = Database::getInstance();
    }
    public function getAllFavoris()
    {
        $connexion = $this->db->getConnexion();
        $req = "SELECT * FROM favoris";
        $stmt = $connexion->prepare($req);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getFavoriById($id)
    {
        $connexion = $this->db->getConnexion();
        $req = "SELECT * FROM favoris WHERE id_Utilisateur = :id_Utilisateur";
        $stmt = $connexion->prepare($req);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}