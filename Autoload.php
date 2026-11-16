<?php
class Autoload
{
    // Methode pour enregistrer l'autoloader
    public static function register()
    {
        //Enregistrer la méthode load comme autoloader
        spl_autoload_register([__CLASS__, 'load']);
    }
    public static function load($className)
    {
            //Def le repertoire de base
            $baseDir = __DIR__ . '/';
            //Def les repertoires à parcourir pour trouver les classes
            $repertoires = [
                'controllers/',
                'models/',
                'views/',
                'core/',
                '/',
            ];
            //Parcourir les repertoires pour trouver le fichier de la classe
            foreach ($repertoires as $repertoire) {
                //Créer le cheminn complet du fichier
                $file = $baseDir . $repertoire . $className . '.php';
                //verif s'il existe (inclureounon)
                if (file_exists($file)) {
                    include $file;
                    return;
                }
            }
    }
}
// Enregistrer l'autoloader
Autoload::register();