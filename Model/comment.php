<?php

// On insère le commentaire en BDD avec la date du jour
function addComment($pdo, $idUtilisateur, $idJeu, $contenu)
{
    try {

        $request = $pdo->prepare("
        INSERT INTO Commentaire (Contenu, Date_, Id_Jeu, Id_Utilisateur)
        VALUES (?, NOW(), ?, ?)
    ");
        $request->execute([$contenu, $idJeu, $idUtilisateur]);
    } catch (PDOException $e) {
        return;
    }
}

// On récupère tous les commentaires d'un jeu avec le pseudo de l'auteur, du plus récent au plus ancien
function getComments($pdo, $idJeu)
{
    try {

        $request = $pdo->prepare("
        SELECT c.Id_Commentaire, c.Contenu, c.Date_, u.Pseudonyme, c.Id_Utilisateur
        FROM Commentaire c
        JOIN Utilisateur u ON c.Id_Utilisateur = u.Id_Utilisateur
        WHERE c.Id_Jeu = ?
        ORDER BY c.Date_ DESC
    ");
        $request->execute([$idJeu]);
        return $request->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        return [];
    }
}

// On supprime le commentaire ciblé par son id
function deleteComment($pdo, $idCommentaire)
{
    try {

        $request = $pdo->prepare("DELETE FROM Commentaire WHERE Id_Commentaire = ?");
        $request->execute([$idCommentaire]);
    } catch (PDOException $e) {
        return;
    }
}

function deleteCommentUser($pdo, $idCommentaire, $idUtilisateur)
{
    try {

        $request = $pdo->prepare("DELETE FROM Commentaire WHERE Id_Commentaire = ?
                                  AND Id_Utilisateur = ?");
        $request->execute([$idCommentaire, $idUtilisateur]);
    } catch (PDOException $e) {
        return;
    }
}
