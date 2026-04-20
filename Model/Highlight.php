<?php

// On récupère les jeux les mieux notés pour la section "Mieux notés" de l'accueil
function getFeaturedGames($pdo, $limit = 5) {
    $req = $pdo->prepare("
        SELECT j.Id_Jeu, j.Titre, j.Image, j.Date_Sortie,
               ROUND(AVG(n.note), 1) AS moyenne,
               COUNT(n.note) AS total
        FROM Jeu j
        JOIN Noter n ON j.Id_Jeu = n.Id_Jeu
        GROUP BY j.Id_Jeu
        ORDER BY moyenne DESC, total DESC
        LIMIT ?
    ");
    $req->bindValue(1, $limit, PDO::PARAM_INT);
    $req->execute();
    return $req->fetchAll(PDO::FETCH_ASSOC);
}

// On récupère les derniers jeux ajoutés en BDD pour la section "Nouveautés"
function getRecentGames($pdo, $limit = 5) {
    $req = $pdo->prepare("
        SELECT Id_Jeu, Titre, Image, Date_Sortie
        FROM Jeu
        ORDER BY Id_Jeu DESC
        LIMIT ?
    ");
    $req->bindValue(1, $limit, PDO::PARAM_INT);
    $req->execute();
    return $req->fetchAll(PDO::FETCH_ASSOC);
}
