<?php

// On démarre une nouvelle session
session_start();

require 'Config/data.php';

/*require 'vendor/autoload.php';*/

require 'Config/router.php';

// On construit de l'objet pour le routage
$router = new Router();
$router->routeRequest();

?>