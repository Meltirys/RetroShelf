<?php

require_once RACINE . '/Model/connect.php';
require_once RACINE . '/Model/Highlight.php';

class home_ctl {

    // On récupère les jeux mis en avant et les derniers ajoutés pour les afficher sur l'accueil
    public function index()
    {
        $conn = new Connexion();
        $pdo  = $conn->getPDO();
        $featured = getFeaturedGames($pdo);
        $recent   = getRecentGames($pdo);

        require_once RACINE . '/View/home.php';
    }
}

?>
