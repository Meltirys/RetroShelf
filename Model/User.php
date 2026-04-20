<?php

// On insère le nouvel utilisateur en BDD avec son pseudo, son email et son mot de passe déjà haché
function addUser($pdo, $pseudo, $email, $mdp) {
    try {
    // On insère les valeurs dans la table
    $requete = $pdo->prepare("INSERT INTO Utilisateur (Pseudonyme, Email, Motdepasse) VALUES (?, ?, ?)");

    // On retourne true si réussi, sinon false
    $success = $requete->execute([$pseudo, $email, $mdp]);

    return $success;

    } catch (PDOException $e) {
        return false;
    }
}

// On récupère les infos d'un utilisateur par son id
function getUser($pdo, $id) {
    try {

    $request = $pdo->prepare("SELECT Id_Utilisateur, Pseudonyme, Email, Motdepasse
                               FROM Utilisateur
                               WHERE Id_Utilisateur = ?");
    $request->execute([$id]);
    return $request->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return null;
    }
}

// On cherche un utilisateur par son email, utilisé lors de la connexion
function loginUser($pdo, $email) {
    try {
    // On récupère l'utilisateur depuis la bdd
    $requete = $pdo->prepare("SELECT * FROM Utilisateur WHERE Email = ?");
    $requete->execute([$email]);

    return $requete->fetch(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        return null;
    }
}

// On anonymise le compte : le pseudo, l'email et le mot de passe sont remplacés pour respecter le RGPD
function deleteUser($pdo, $id) {
    try {

    $request = $pdo->prepare("UPDATE Utilisateur SET
        Pseudonyme = 'Utilisateur supprimé',
        Email = NULL,
        Motdepasse = NULL
        WHERE Id_Utilisateur = ?");
    $request->execute([$id]);
    } catch(PDOException $e) {
        return false;
    }
}

// On met à jour le pseudo et l'email, et le mot de passe si un nouveau a été fourni
function updateUser($pdo, $id, $pseudo, $email, $mdp = null) {
    try {

    if ($mdp !== null) {
        $hashpassword = password_hash($mdp, PASSWORD_DEFAULT);
        $request = $pdo->prepare("UPDATE Utilisateur SET Pseudonyme = ?, Email = ?, Motdepasse = ? WHERE Id_Utilisateur = ?");
        $request->execute([$pseudo, $email, $hashpassword, $id]);
    } else {
        $request = $pdo->prepare("UPDATE Utilisateur SET Pseudonyme = ?, Email = ? WHERE Id_Utilisateur = ?");
        $request->execute([$pseudo, $email, $id]);
    }
    } catch(PDOException $e) {
        return false;
    }
}

// On récupère tous les utilisateurs pour le tableau de bord admin
function getAllUsers($pdo) {
    try {

    $request = $pdo->prepare("SELECT Id_Utilisateur, Pseudonyme, Email FROM Utilisateur ORDER BY Id_Utilisateur DESC");
    $request->execute();
    return $request->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        return [];
    }
}

// On compte le nombre total de membres et de jeux pour les stats du dashboard
function getStats($pdo) {
    try {

    $request = $pdo->query("SELECT
                            (SELECT COUNT(*) FROM Utilisateur) AS nb_membres,
                            (SELECT COUNT(*) FROM Jeu) AS nb_jeux");
    return $request->fetch(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        return null;
    }
}

?>
