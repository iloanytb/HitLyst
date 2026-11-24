<?php
class Musique
{
        private $db;

        public function __construct()
        {
                $this->db = Database::getInstance();
        }
        public function getAllMusics()
        {
                $connexion = $this->db->getConnexion();
                $req = "SELECT * FROM musique";
                $cmd = $connexion->prepare($req);
                $cmd->execute();
                return $cmd->fetchAll(PDO::FETCH_ASSOC);
        }
        public function getMusicById($id)
        {
                $connexion = $this->db->getConnexion();
                $req = "SELECT * FROM musique WHERE id = :id";
                $cmd = $connexion->prepare($req);
                $cmd->bindParam(':id', $id, PDO::PARAM_INT);
                $cmd->execute();
                return $cmd->fetch(PDO::FETCH_ASSOC);
        }
}