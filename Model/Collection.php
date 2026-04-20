<?php

// On ajoute le jeu à la collection ou on met à jour son statut s'il est déjà présent (ON DUPLICATE KEY)
function addToCollection($pdo, $idUtilisateur, $idJeu, $statut) {
    try {

    $req = $pdo->prepare("INSERT INTO Ajouter (Id_Utilisateur, Id_Jeu, Statut) VALUES (?, ?, ?)
                          ON DUPLICATE KEY UPDATE Statut = ?");
    $req->execute([$idUtilisateur, $idJeu, $statut, $statut]);
    } catch(PDOException $e) {
        return;
    }
}

// On supprime le jeu de la collection de l'utilisateur
function removeFromCollection($pdo, $idUtilisateur, $idJeu) {
    try {

    $req = $pdo->prepare("DELETE FROM Ajouter WHERE Id_Utilisateur = ? AND Id_Jeu = ?");
    $req->execute([$idUtilisateur, $idJeu]);
    } catch(PDOException $e) {
        return;
    }
}

// On récupère tous les jeux de la collection d'un utilisateur avec leur statut
function getCollection($pdo, $idUtilisateur) {
    try {

    $req = $pdo->prepare("SELECT j.Id_Jeu, j.Titre, j.Image, j.Date_Sortie, a.Statut
                          FROM Ajouter a
                          JOIN Jeu j ON a.Id_Jeu = j.Id_Jeu
                          WHERE a.Id_Utilisateur = ?
                          ORDER BY j.Titre");
    $req->execute([$idUtilisateur]);
    return $req->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        return [];
    }
}

// On vérifie si un jeu est dans la collection et on retourne son statut, false s'il n'y est pas
function getGameInCollection($pdo, $idUtilisateur, $idJeu) {
    try {
    $req = $pdo->prepare("SELECT Statut FROM Ajouter WHERE Id_Utilisateur = ? AND Id_Jeu = ?");
    $req->execute([$idUtilisateur, $idJeu]);
    return $req->fetch(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        return false;
    }
}
