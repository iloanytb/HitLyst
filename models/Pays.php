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
        $cmd = $connexion->prepare($req);
        $cmd->execute();
        return $cmd->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getPaysById($id)
    {
        $connexion = $this->db->getConnexion();
        $req = "SELECT * FROM pays WHERE id = :id";
        $cmd = $connexion->prepare($req);
        $cmd->bindParam(':id', $id, PDO::PARAM_INT);
        $cmd->execute();
        return $cmd->fetch(PDO::FETCH_ASSOC);
    }
}