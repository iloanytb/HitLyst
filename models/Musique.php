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
                $query = "SELECT * FROM musique";
                $stmt = $connexion->prepare($query);
                $stmt->execute();
                return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        public function getMusicById($id)
        {
                $connexion = $this->db->getConnexion();
                $query = "SELECT * FROM musique WHERE id = :id";
                $stmt = $connexion->prepare($query);
                $stmt->bindParam(':id', $id, PDO::PARAM_INT);
                $stmt->execute();
                return $stmt->fetch(PDO::FETCH_ASSOC);
        }
}