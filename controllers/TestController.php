<?php
class TestController
{
    public function index(){
        
        $database = Database::getInstance();
        $cnx = $database->getConnection();
        if($cnx){
            echo "Connexion à la base de données réussie !";
        } 
        else {
            echo "Erreur de connexion à la base de données.";
        }
    }
}