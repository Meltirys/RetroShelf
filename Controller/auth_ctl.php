<?php

require_once RACINE . '/Model/connect.php';
require_once RACINE . '/Model/User.php';

class Auth_ctl {

    // -------------------------------------------------------------------------
    // CONNEXION
    // -------------------------------------------------------------------------

    // On affiche la page d'authentification avec l'onglet connexion ouvert
    public function index() {
        $message   = "";
        $activeTab = 'login';
        require RACINE . '/View/auth.php';
    }

    // On vérifie les identifiants saisis et on ouvre la session si c'est bon
    public function login() {
        $message = "";

        if (!empty($_POST)) {
            $email = $_POST['email'] ?? '';
            $mdp   = $_POST['mdp']   ?? '';

            if (empty($email) || empty($mdp)) {
                $message = "<p>Veuillez remplir tous les champs.</p>";
            } elseif (!str_contains($email, '@')) {
                $message = "<p>L'adresse email n'est pas valide.</p>";
            } else {
                try {
                    $conn = new Connexion();
                    $pdo  = $conn->getPDO();
                    $user = loginUser($pdo, $email);

                    // On vérifie si le mot de passe saisi concorde avec celui de la bdd
                    if ($user && password_verify($mdp, $user['Motdepasse'])) {
                        // On stock les données de session
                        $_SESSION['user_id'] = $user['Id_Utilisateur'];
                        $_SESSION['pseudo']  = $user['Pseudonyme'];
                        $_SESSION['role']    = $user['role'];
                        // On redirige vers la page d'accueil
                        header('Location: ' . BASE_URL . '/');
                        exit;
                    } else {
                        $message = "<p>Email ou mot de passe incorrect</p>";
                    }
                } catch (\Throwable) {
                    $message = "<p>Erreur de connexion</p>";
                }
            }
        }

        $activeTab = 'login';
        require RACINE . '/View/auth.php';
    }

    // -------------------------------------------------------------------------
    // INSCRIPTION
    // -------------------------------------------------------------------------

    // On affiche la page d'authentification avec l'onglet inscription ouvert
    public function inscription() {
        $message   = "";
        $activeTab = 'inscription';
        require RACINE . '/View/auth.php';
    }

    // On valide les données du formulaire, on hache le mot de passe et on crée le compte
    public function save() {
        $message = "";

        if (!empty($_POST)) {
            // On récupère les informations contenues dans le formulaire
            $pseudo = $_POST['pseudo'] ?? '';
            $email  = $_POST['email']  ?? '';
            $mdp    = $_POST['mdp']    ?? '';

            if (empty($pseudo) || empty($email) || empty($mdp)) {
                $message = "<p>Veuillez remplir tous les champs.</p>";
            } elseif (!str_contains($email, '@')) {
                $message = "<p class='error'>L'adresse email n'est pas valide.</p>";
            } elseif (strlen($mdp) < 8) {
                $message = "<p class='error'>Le mot de passe doit faire au moins 8 caractères.</p>";
            } else {
                // Toutes les vérifications sont passées, on hache le mot de passe avant insertion
                $mdp = password_hash($mdp, PASSWORD_DEFAULT);

                try {
                    $conn    = new Connexion();
                    $pdo     = $conn->getPDO();
                    $success = addUser($pdo, $pseudo, $email, $mdp);

                    if ($success) {
                        $message = "<p>Inscription réussie ! Bienvenue sur RetroShelf.</p>";
                    } else {
                        $message = "<p>Veuillez reformuler votre inscription.</p>";
                    }
                } catch (Exception $e) {
                    $message = "<p>Erreur lors de l'envoi : " . $e->getMessage() . "</p>";
                }
            }
        }

        $activeTab = 'inscription';
        require RACINE . '/View/auth.php';
    }
}
