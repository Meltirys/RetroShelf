<?php

require_once RACINE . '/Model/connect.php';
require_once RACINE . '/Model/comment.php';

class comm_ctl
{

    // On affiche la page des commentaires
    public function index()
    {

        require_once RACINE . '/View/comments.php';
    }

    // On vérifie que l'utilisateur est connecté avant d'ajouter son commentaire, puis on redirige vers la fiche du jeu
    public function add($idJeu)
    {

        if (!empty($_SESSION['user_id'])) {
            $contenu = trim($_POST['contenu'] ?? '');

            if (!empty($contenu)) {
                $connexion = new Connexion();
                $pdo = $connexion->getPDO();
                addComment($pdo, $_SESSION['user_id'], $idJeu, $contenu);
            }
        }

        header("Location: " . BASE_URL . "/game/index/{$idJeu}");
        exit;
    }

    // Seul un admin peut supprimer tous les commentaires — si ce n'est pas le cas on renvoie vers l'accueil
    public function deleteComment($id)
    {

        if (!empty($_SESSION['role']) && $_SESSION['role'] == 1) {

            $idJeu = $_POST['id_jeu'] ?? 0;
            $conn = new Connexion();
            $pdo = $conn->getPDO();

            // On supprime le commentaire ciblé
            deleteComment($pdo, $id);

            header('Location: ' . BASE_URL . '/game/index/' . $idJeu);
            exit;
        } else {

            header('Location: ' . BASE_URL . '/');
            exit;
        }
    }

    // On supprime le commentaire si l'utilisateur est connecté et en est l'auteur
    public function deleteCommentUser($id)
    {

        $idJeu = $_POST['id_jeu'] ?? 0;

        if (!empty($_SESSION['user_id'])) {

            $conn = new Connexion();
            $pdo = $conn->getPDO();
            deleteCommentUser($pdo, $id, $_SESSION['user_id']);
        }

        header('Location: ' . BASE_URL . '/game/index/' . $idJeu);
        exit;
    }
}
