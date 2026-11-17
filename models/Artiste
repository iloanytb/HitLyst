<?php
class Artiste
{
    private $db;

    public function _construct()
    {
        $this ->db = Database::getInstance();
    }
    public function getAllArtistes()
    {
        $connexion = $this->db->getConnexion();
        $req = "SELECT * FROM artiste";
        $cmd = $connexion->prepare($req);
        $cmd->execute();
        return $cmd->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getArtisteById($id)
    {
        $connexion = $this ->db ->getConnexion();
        $req = "SELECT * FROM artiste WHERE id=:id";
        $cmd = $connexion->prepare($req);
        $cmd->bindParam(':id', $id, PDO::PARAM_INT);
        $cmd->execute();
        return $cmd->fetch(PDO::FETCH_ASSOC);
    }

    public function getArtisteByNom($nom)
    {
        $connexion = $this->db->getConnexion();
        $req = "SELECT * FROM artiste WHERE nom=:nom";
        $cmd = $connexion->prepare($req);
        $cmd->bindParam(':nom', $nom, PDO::PARAM_STR);
        $cmd->execute();
        return $cmd->fetch(PDO::FETCH_ASSOC);
    }
    
    public function getArtisteByPrenom($prenom)
    {
        $connexion = $this->db->getConnexion();
        $req = "SELECT * FROM artiste WHERE prenom=:prenom";
        $cmd = $connexion->prepare($req);
        $cmd->bindParam(':prenom', $prenom, PDO::PARAM_STR);
        $cmd->execute();
        return $cmd->fetch(PDO::FETCH_ASSOC);
    }
}