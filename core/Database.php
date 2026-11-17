<?php
class Database
{
    private static $instance;
    private $connexion;

    private function __construct($host,$dbname,$username,$password)
    {
            //Méthode pour obtenir une instance unique de la classe Database
            try {
                // Création d'une connexion PDO à la base de données
                $this->connexion = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
                // Mode erreur de PDO pour lancer des exceptions en cas d'erreur
                $this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $ex) {
                die("Erreur de connexion à la base de données : " . $ex->getMessage());
            }
        
    }
    // Création de la méthode getInstance
    // Méthode statique pour obtenir l'instance unique de la classe Database
    // Car constructeur en privé, on ne peut pas instancier la classe directement
    public static function getInstance()
    {
        if (self::$instance === null) {
            // Remplacer les constantes par nos propres variables de connexion
            self::$instance = new Database(DB_HOST,DB_NAME,DB_USER,DB_PASSWORD);
        }
        return self::$instance;
    }
    // Méthode pour obtenir la cnnexion PDO à la base de données
    public function getConnexion()
    {
        return $this->connexion;
    }
} 