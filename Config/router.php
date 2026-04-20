<?php

class Router
{
    public function routeRequest()
    {
        $url = $_GET['url'] ?? null;
        // Séparation en tableau de la chaine et suppresion des espaces vide
        $urlParts = $url ? explode('/', trim($url, '/')) : [];

        $baseName = empty($urlParts[0]) ? 'home' : strtolower($urlParts[0]);

        // Construction du nom du fichier attendu
        $controllerFileName = $baseName . '_ctl.php';

        // On définit le nom de la classe du contrôleur
        $controllerClassName = ucfirst($baseName) . '_ctl';

        // On définit la méthode (l'action) à appeler
        $methodName = empty($urlParts[1]) ? 'index' : $urlParts[1];

        // COnstruction du chemin vers le fichier
        $controllerFile = dirname(__DIR__) . '/Controller/' . $controllerFileName;

        if (file_exists($controllerFile)) {
            require_once $controllerFile;
            
            // On vérifie que la classe existe bien dans ce fichier avant la construction
            if (class_exists($controllerClassName)) {
                $controller = new $controllerClassName();

                if (method_exists($controller, $methodName)) {
                    // On récupère dans un tableau les paramètres depuis l'index 2 de $urlParts
                    $params = array_slice($urlParts, 2); 

                    if (count($params) > 0) {
                        // Méthode avec paramètres
                            call_user_func_array([$controller, $methodName], $params);
                    } else {
                        // Méthode sans paramètre
                        $controller->$methodName();
                    }
                } else {
                    // Gestion des différentes erreurs
                    http_response_code(404);
                    require RACINE . '/View/404.php';

                }
            } else {

                http_response_code(404);
                require RACINE . '/View/404.php';
                
            }
        } else {

            http_response_code(404);
            require RACINE . '/View/404.php';
            
        }
    }
}