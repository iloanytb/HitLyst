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
        $cmd = $connexion->prepare($req);
        $cmd->execute();
        return $cmd->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getFavoriById($id)
    {
        $connexion = $this->db->getConnexion();
        $req = "SELECT * FROM favoris WHERE id_Utilisateur = :id_Utilisateur";
        $cmd = $connexion->prepare($req);
        $cmd->bindParam(':id', $id, PDO::PARAM_INT);
        $cmd->execute();
        return $cmd->fetch(PDO::FETCH_ASSOC);
    }
}