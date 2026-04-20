<?php

class logout_ctl {

    // On vide la session et on redirige vers l'accueil
    public function index() {

        $_SESSION = array();
        // On détruit la session actuellement chargée
        session_destroy();

        header('Location: ' . BASE_URL . '/');

        exit;

    }
}

?>
