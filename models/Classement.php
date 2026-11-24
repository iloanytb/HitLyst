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
        $cmd = $connexion->prepare($req);
        $cmd->execute();
        return $cmd->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getClassementById($id)
    {
        $connexion = $this->db->getConnexion();
        $req = "SELECT * FROM classement WHERE id = :id";
        $cmd = $connexion->prepare($req);
        $cmd->bindParam(':id', $id, PDO::PARAM_INT);
        $cmd->execute();
        return $cmd->fetch(PDO::FETCH_ASSOC);
    }
}