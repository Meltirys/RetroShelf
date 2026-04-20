<?php

// On ajoute la note ou on la met à jour si l'utilisateur a déjà noté ce jeu
function addNote($pdo, $idUtilisateur, $idJeu, $note) {
    try{

    $request = $pdo->prepare("SELECT COUNT(*) FROM Noter
                               WHERE Id_Utilisateur = ? AND Id_Jeu = ?");
    $request->execute([$idUtilisateur, $idJeu]);
    $exist = $request->fetchColumn();

    if ($exist) {
        // Si une note existe déjà pour cet utilisateur sur ce jeu, on la met à jour
        $request = $pdo->prepare("UPDATE Noter SET note = ?
                                   WHERE Id_Utilisateur = ? AND Id_Jeu = ?");
        $request->execute([$note, $idUtilisateur, $idJeu]);
    } else {
        // Et si aucune note n'existe, on en crée une nouvelle
        $request = $pdo->prepare("INSERT INTO Noter (Id_Utilisateur, Id_Jeu, note)
                                   VALUES (?, ?, ?)");
        $request->execute([$idUtilisateur, $idJeu, $note]);
    }
    } catch(PDOException $e) {
        return;
    }
}

// On récupère la note d'un utilisateur pour un jeu donné, retourne null s'il n'a pas encore noté
function getNote($pdo, $idUtilisateur, $idJeu) {
    try {

    $request = $pdo->prepare("SELECT note FROM Noter
                               WHERE Id_Utilisateur = ? AND Id_Jeu = ?");
    $request->execute([$idUtilisateur, $idJeu]);
    $result = $request->fetch(PDO::FETCH_ASSOC);

    return $result ? $result['note'] : null;
    } catch(PDOException $e) {
        return null;
    }
}

// On calcule la note moyenne et le nombre de votes pour un jeu
function getAverage($pdo, $idJeu) {
    try {

    $request = $pdo->prepare("SELECT ROUND(AVG(note), 1) AS moyenne,
                                      COUNT(note) AS total
                               FROM Noter
                               WHERE Id_Jeu = ?");
    $request->execute([$idJeu]);

    return $request->fetch(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        return null;
    }
}
