<?php
class Pays 
{
    private $db;

    public function _construct()
    {
        $this -> db = Database::getInstance();
    }
    public function getAllPays()
    {
        $connexion = $this->db->getConnexion();
        $req = "SELECT * FROM pays";
        $stmt = $connexion->prepare($req);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getPaysById($id)
    {
        $connexion = $this->db->getConnexion();
        $req = "SELECT * FROM pays WHERE id = :id";
        $stmt = $connexion->prepare($req);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}