<?php
require 'config.php';
class Router
{
    public function routeRequest()
    {
        //recup l'URL de la requête
        $url = isset($_GET['url']) ? $_GET['url'] : '/';
        //découpe l'URL en parties
        $urlPart = explode('/', trim($url, '/'));
        //détermine le contrôleur (première partie URL) et l'action à appeler (deuxième partie URL)
        $controllerName = !empty($urlPart[0]) ? ucfirst($urlPart[0]) . 'Controller' : 'HomeController';
        $action = !empty($urlPart[1]) ? $urlPart[1] : 'index';
        //construit le chemin du fichier du contrôleur
        $controllerFile = 'controllers/' . $controllerName . '.php';
        if (file_exists($controllerFile)) {
            require_once $controllerFile;
            if (class_exists($controllerName)) {
                $controller = new $controllerName();
                if (method_exists($controller, $action)) {
                    //Recup les param sup à partir de la 3ème partie de l'URL
                    $params = array_slice($urlPart, 2);
                    $uneReflectionMethod = new ReflectionMethod($controller, $action);
                    $methodParams = $uneReflectionMethod->getParameters();
                    //Verif si on a des params
                    if (count($methodParams) > 0) {
                        //si nbParams URL > nbParams méthode ou non
                        if (count($params) >= count($methodParams)) {
                            //appeler methode avec params
                            call_user_func_array([$controller, $action], $params);
                        } else {
                            //Appel de la méthode avec params
                            echo "Erreur 404 - Paramètres passés dans l'URL insuffisants";
                        }

                    } else {
                        //Appel de la méthode sans params
                        $controller->$action();
                    }
                    // test
                    // foreach ($methodParams as $param) {
                    //     echo $param->getName()."<br>";
                    // }
                } else {
                    echo "Erreur 404 -Méthode '$action' non existante dans le contrôleur '$controllerName'.";
                }
            } else {
                echo "Erreur 404 - Classe '$controllerName' Inexistante." . "<br>";
            }
        } else {
            echo "Erreur 404 - Page non trouvée : $controllerFile non existant." . "<br>";
        }
    }
}