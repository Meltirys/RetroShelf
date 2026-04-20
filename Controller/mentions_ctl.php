<?php

class mentions_ctl {

    // On affiche la page des mentions légales
    public function index() {

        require_once RACINE . '/View/mentions.php';
    }

    // On vérifie que tous les champs sont remplis et on affiche un message de confirmation (simulation, pas d'envoi réel)
    public function contact() {

        $nom     = trim($_POST['nom']     ?? '');
        $email   = trim($_POST['email']   ?? '');
        $message = trim($_POST['message'] ?? '');

        if (empty($nom) || empty($email) || empty($message)) {
            $message_contact = "Veuillez remplir tous les champs.";
        } elseif (!str_contains($email, '@')) {
            $message_contact = "L'adresse email n'est pas valide.";
        } else {
            $message_contact = "Votre message a bien été envoyé. Merci !";
        }

        require_once RACINE . '/View/mentions.php';
    }

}
