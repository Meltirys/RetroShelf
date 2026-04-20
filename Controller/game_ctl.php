<?php

require_once RACINE . '/Model/connect.php';
require_once RACINE . '/Model/Game.php';
require_once RACINE . '/Model/Note.php';
require_once RACINE . '/Model/Collection.php';
require_once RACINE . '/Model/comment.php';

class Game_ctl {

    // On charge toutes les infos d'un jeu : plateformes, catégories, note moyenne, statut dans la collection et commentaires
    public function index($id) {

        $connexion = new Connexion();
        $pdo       = $connexion->getPDO();
        $model     = new GameModel($pdo);

        // On récupère le jeu depuis la BDD locale grâce à son id
        $jeu = $model->getGameById($id);

        // Si aucun jeu ne correspond à cet id on arrête et retourne le message
        if (!$jeu) {
            echo "Jeu introuvable";
            exit;
        }

        // On récupère les plateformes associées à ce jeu
        // Exemple : ["Super Nintendo", "Game Boy"]
        $plateformes = $model->getPlateformperGame($id);

        // On récupère les catégories associées à ce jeu
        // Exemple : ["Action", "Aventure"]
        $categories = $model->getCatperGame($id);

        // On calcule la note moyenne et le nombre de votes pour ce jeu
        // On retourne un tableau avec la moyenne et le total
        $average = getAverage($pdo, $id);

        // On récupère la note de l'utilisateur connecté pour ce jeu
        // Vaut null si l'utilisateur n'est pas connecté ou n'a pas encore noté
        $noteUser = null;
        if (!empty($_SESSION['user_id'])) {
            $noteUser = getNote($pdo, $_SESSION['user_id'], $id);
        }

        // On vérifie si le jeu est dans la collection de l'utilisateur connecté
        // Vaut false si l'utilisateur n'est pas connecté ou si le jeu n'est pas dans sa collection
        $inCollection = false;
        if (!empty($_SESSION['user_id'])) {
            $inCollection = getGameInCollection($pdo, $_SESSION['user_id'], $id);
        }

        // On récupère la description depuis l'API RAWG si elle est absente en BDD
        // Une fois récupérée elle est sauvegardée en BDD pour les prochaines recherches
        $jeu['Description'] = $model->Description($jeu);

        // On récupère les commentaires pour un jeu
        $commentaires = getComments($pdo, $id);

        require_once RACINE . '/View/game.php';
    }

    // On enregistre la note d'un utilisateur connecté pour ce jeu, puis on le redirige vers la fiche
    public function note($id) {

        // On vérifie que seul un membre connecté peut noter un jeu
        if (!empty($_SESSION['user_id'])) {

            // On envoi en entier pour éviter toute valeur inattendue
            $note = (int) $_POST['note'];

            // On vérifie que la note est bien compris entre 1 et 5
            if ($note >= 1 && $note <= 5) {

                $connexion = new Connexion();
                $pdo       = $connexion->getPDO();

                // On ajoute ou met à jour la note en BDD
                // Si l'utilisateur a déjà noté ce jeu, sa note est mise à jour
                addNote($pdo, $_SESSION['user_id'], $id, $note);
            }
        }

        // Dans tous les cas on redirige vers la fiche du jeu
        // que la note ait été enregistrée ou non
        header("Location: " . BASE_URL . "/game/index/{$id}");
        exit;
    }
}
