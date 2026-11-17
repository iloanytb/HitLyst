<?php
class Classement
{
    private $db;

    public function _construct()
    {
        $this -> db = Database::getInstance();
    }
    public function getAllClassements()
    {
        $connexion = $this->db->getConnexion();
        $req = "SELECT * FROM classement";
        $stmt = $connexion->prepare($req);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getClassementById($id)
    {
        $connexion = $this->db->getConnexion();
        $req = "SELECT * FROM classement WHERE id = :id";
        $stmt = $connexion->prepare($req);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}