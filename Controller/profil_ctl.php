<?php

require_once RACINE . '/Model/connect.php';
require_once RACINE . '/Model/User.php';
require_once RACINE . '/Model/Collection.php';

class profil_ctl {

    // On redirige vers la connexion si l'utilisateur n'est pas connecté, sinon on charge ses infos et sa collection
    public function index() {

        // On redirige l'utilisateur vers la page de connexion s'il n'est pas connecté
        if (empty($_SESSION['user_id'])) {
            header('Location: ' . BASE_URL . '/auth');
            exit;
        }

        $conn = new Connexion();
        $pdo  = $conn->getPDO();
        // On récupère les informations de l'utilisateur par son id de session
        $user       = getUser($pdo, $_SESSION['user_id']);
        $collection = getCollection($pdo, $_SESSION['user_id']);

        $message = "";

        require RACINE . '/View/profil.php';
    }

    // On traite le formulaire de profil : on vérifie les données et on met à jour avec ou sans changement de mot de passe
    public function update() {

        if (empty($_SESSION['user_id'])) {
            header('Location: ' . BASE_URL . '/auth');
            exit;
        }

        $conn = new Connexion();
        $pdo  = $conn->getPDO();
        // On récupère les données actuelles pour vérifier l'ancien mot de passe
        $user = getUser($pdo, $_SESSION['user_id']);

        // On récupère les valeurs envoyées par le formulaire
        $pseudo = $_POST['pseudo'] ?? '';
        $email = $_POST['email'] ?? '';
        $actualpass = $_POST['mdp_actuel'] ?? '';
        $mdp = $_POST['mdp'] ?? '';
        $passValid = $_POST['mdp_confirm'] ?? '';

        $message = "";

        if(!str_contains($email, '@')) {
            $message = "<p>L'adresse email n'est pas valide.</p>";
        } else {
        if (!empty($actualpass) || !empty($mdp) || !empty($passValid)) {

            //On vérifie que l'ancien mot de passe correspond à celui dans la bdd
            if (!password_verify($actualpass, $user['Motdepasse'])) {
                $message = "<p class='erreur'>Mot de passe actuel incorrect.</p>";

            // On vérifie que les deux nouveaux mots de passe sont identiques
            } elseif ($mdp !== $passValid) {
                $message = "<p class='erreur'>Les mots de passe ne correspondent pas.</p>";

            // On vérifie que la longueur du mot de passe soit respecté
            } elseif (strlen($mdp) < 8) {
                $message = "<p class='erreur'>Le mot de passe doit faire au moins 8 caractères.</p>";

            // On met à jour le mot de passe, toutes les vérifications sont passées
            } else {
                updateUser($pdo, $_SESSION['user_id'], $pseudo, $email, $mdp);
                $_SESSION['pseudo'] = $pseudo;
                $message = "<p class='succes'>Vos informations ont bien été mises à jour.</p>";
            }

        // Si aucun champ de mot de passe n'est rempli, seul le mail et le pseudo sont mis à jour
        } else {
            updateUser($pdo, $_SESSION['user_id'], $pseudo, $email);
            $_SESSION['pseudo'] = $pseudo;
            $message = "<p class='succes'>Vos informations ont bien été mises à jour.</p>";
        }
        }

        // On recharge l'utilisateur pour afficher les données à jour
        $user       = getUser($pdo, $_SESSION['user_id']);
        $collection = getCollection($pdo, $_SESSION['user_id']);

        require RACINE . '/View/profil.php';
    }

    // On anonymise le compte (pseudo, email, mot de passe effacés) et on détruit la session
    public function delete() {

        // Si l'utilisateur n'est pas connecté, on le redirige vers la connexion
        if (empty($_SESSION['user_id'])) {
            header('Location: ' . BASE_URL . '/auth');
            exit;
        }

        $conn = new Connexion();
        $pdo  = $conn->getPDO();

        // On rend anonyme le compte (le pseudo, le mot de passe et le mail sont effacés)
        deleteUser($pdo, $_SESSION['user_id']);

        session_destroy();

        header('Location: ' . BASE_URL . '/');
        exit;
    }
}
?>
