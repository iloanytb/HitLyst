<?php
class Database{
    public static $instance;
    private $connection;

    //methode pour obtenir une instance unique de la classe database
    private function __construct($host, $dbname, $username, $password){
        try{
            //création d'une connexion PDO à la base de donnéesa
            $this->connection = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
            //mode d'erreur de PDO sur Exception
            $this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } 
        catch (PDOException $ex) {
            die("Erreur de connexion à la base de données : " . $ex->getMessage());
        }
    }
    //creation de la methode getInstance
    //methode statique pour obtenir l'instance unique de la classe database
    //car constructeur privé
    public static function getInstance($host, $dbname, $username, $password){   
        if(self::$instance === null){
            //remplacer les constantes par nos propres infos de cnx à la bdd
            self::$instance = new Database(DB_HOST, DB_NAME, DB_USER, DB_PASSWORD);
        return self::$instance;
        }
    }
}