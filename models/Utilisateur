<?php
class Utilisateur
{
        private $db;

        public function __construct()
        {
                $this->db = Database::getInstance();
        }
        public function getAllUsers()
        {
                $connexion = $this->db->getConnexion();
                $req = "SELECT * FROM utilisateur";
                $cmd = $connexion->prepare($req);
                $cmd->execute();
                return $cmd->fetchAll(PDO::FETCH_ASSOC);
        }
        public function getUserById($id)
        {
                $connexion = $this->db->getConnexion();
                $req = "SELECT * FROM utilisateur WHERE id = :id";
                $cmd = $connexion->prepare($req);
                $cmd->bindParam(':id', $id, PDO::PARAM_INT);
                $cmd->execute();
                return $cmd->fetch(PDO::FETCH_ASSOC);
        }
        public function createUser($nom, $email, $mot_de_passe)
        {
                $connexion = $this->db->getConnexion();
                $req = "INSERT INTO utilisateur (nom, email, mot_de_passe) VALUES (:nom, :email, :mot_de_passe)";
                $cmd = $connexion->prepare($req);
                $cmd->bindParam(':nom', $nom);
                $cmd->bindParam(':email', $email);
                $cmd->bindParam(':mot_de_passe', password_hash($mot_de_passe, PASSWORD_DEFAULT));
                return $cmd->execute();
        }
        public function updateUser($nom,$email, $mot_de_passe, $id)
        {
                $connexion = $this->db->getConnexion();
                $req = "UPDATE utilisateur SET nom = :nom, email = :email, mot_de_passe = :mot_de_passe WHERE id = :id";
                $cmd = $connexion->prepare($req);
                $cmd->bindParam(':nom', $nom);
                $cmd->bindParam(':email', $email);
                $cmd->bindParam(':mot_de_passe', password_hash($mot_de_passe, PASSWORD_DEFAULT));
                $cmd->bindParam(':id', $id, PDO::PARAM_INT);
                return $cmd->execute();
        }
        public function deleteUser($id)
        {
                $connexion = $this->db->getConnexion();
                $req = "DELETE FROM utilisateur WHERE id = :id";
                $cmd = $connexion->prepare($req);
                $cmd->bindParam(':id', $id, PDO::PARAM_INT);
                return $cmd->execute();
        }
}