<?php

require_once RACINE . '/Model/connect.php';
require_once RACINE . '/Model/User.php';
require_once RACINE . '/Model/comment.php';
require_once RACINE . '/Model/Game.php';

class admin_ctl {

    // Sécurité : si l'utilisateur n'est pas admin on le renvoie à l'accueil
    private function checkAdmin() {
        if (empty($_SESSION['user_id']) || $_SESSION['role'] != 1) {
            header('Location: ' . BASE_URL . '/');
            exit;
        }
    }

    // On charge les stats du site et la liste des membres pour le dashboard admin
    public function index() {
        $this->checkAdmin();

        $connexion    = new Connexion();
        $pdo          = $connexion->getPDO();
        $stats        = getStats($pdo);
        $utilisateurs = getAllUsers($pdo);

        require RACINE . '/View/admin.php';
    }

    // On anonymise l'utilisateur ciblé depuis le dashboard et on redirige
    public function deleteUser($id) {
        $this->checkAdmin();

        $connexion = new Connexion();
        $pdo       = $connexion->getPDO();

        // On anonymise le compte utilisateur
        deleteUser($pdo, $id);

        header('Location: ' . BASE_URL . '/admin');
        exit;
    }

    // On charge le formulaire d'édition avec les données actuelles du jeu
    public function editGame($id) {
        $this->checkAdmin();

        $connexion = new Connexion();
        $pdo       = $connexion->getPDO();
        $model     = new GameModel($pdo);

        // On récupère le jeu à modifier
        $jeu = $model->getGameById($id);

        require RACINE . '/View/admin_edit_game.php';
    }

    // On enregistre les nouvelles valeurs du formulaire et on redirige vers la fiche du jeu
    public function updateGame($id) {
        $this->checkAdmin();

        $titre      = $_POST['titre']       ?? '';
        $dateSortie = $_POST['date_sortie'] ?? '';
        $image      = $_POST['image']       ?? '';

        $connexion = new Connexion();
        $pdo       = $connexion->getPDO();
        $model = new GameModel($pdo);

        // On met à jour la fiche jeu en BDD
        $model->updateGame($id, $titre, $dateSortie, $image);

        header('Location: ' . BASE_URL . '/game/index/' . (int)$id);
        exit;
    }
}
