<?php

require_once RACINE . '/Model/connect.php';
require_once RACINE . '/Model/Collection.php';

class Ludotheque_ctl {

    // On ajoute le jeu à la collection de l'utilisateur, ou on met à jour son statut s'il y est déjà
    public function add($idJeu) {

        if (empty($_SESSION['user_id'])) {
            header('Location: ' . BASE_URL . '/auth');
            exit;
        }

        $statut = $_POST['statut'] ?? 'possede';

        // On s'assure que la valeur est bien l'une des deux autorisées
        if (!in_array($statut, ['possede', 'souhait'])) {
            $statut = 'possede';
        }

        $conn = new Connexion();
        $pdo  = $conn->getPDO();

        addToCollection($pdo, $_SESSION['user_id'], (int)$idJeu, $statut);

        header('Location: ' . BASE_URL . '/game/index/' . (int)$idJeu);
        exit;
    }

    // On retire le jeu de la collection de l'utilisateur
    public function remove($idJeu) {

        if (empty($_SESSION['user_id'])) {
            header('Location: ' . BASE_URL . '/auth');
            exit;
        }

        $conn = new Connexion();
        $pdo  = $conn->getPDO();

        removeFromCollection($pdo, $_SESSION['user_id'], (int)$idJeu);

        header('Location: ' . BASE_URL . '/game/index/' . (int)$idJeu);
        exit;
    }
}
