<?php
class MusiqueController
{
    public function index()
    {
        echo "Bienvenue sur la page de musique !";
    }
    public function getAllMusique()
    {
        // Instanciation de la classe Musique
        $musiqueModel = new Musique();
        // Récupération de toutes les musiques
        $musiques = $musiqueModel->getAllMusique();
        // Affichage des musiques
       // echo "<pre>";
       // var_dump($musiques);
       // echo "</pre>";
       require_once 'views/musiques/index.php';
    }
    public function getMusiqueById($id)
    {
        // Instanciation de la classe Musique
        $musiqueModel = new Musique();
        // Récupération de la musique par son ID
        $musique = $musiqueModel->getMusiqueById($id);
        // Affichage de la musique
       // echo "<pre>";
       // var_dump($musique);
       // echo "</pre>";
        require_once 'views/musiques/detail.php';
    }
}