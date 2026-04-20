<?php

require_once RACINE . '/Model/connect.php';
require_once RACINE . '/Model/Game.php';

class Search_ctl {

    // On affiche la page de recherche
    public function index() {
        require_once RACINE . '/View/search.php';
    }

    // On cherche le mot-clé dans la BDD locale et on retourne les résultats en JSON pour api.js
    public function results() {

        header('Content-Type: application/json');

        $keyword = $_GET['keyword'] ?? '';

        if (empty($keyword)) {
            echo json_encode([]);
            exit;
        }

        $connexion = new Connexion();
        $pdo       = $connexion->getPDO();
        $model     = new GameModel($pdo);

        // On cherche uniquement en local et
        // api.js se charge de compléter avec les résultats de RAWG
        $localGames = $model->searchGames($keyword);

        echo json_encode($localGames);
        exit;
    }

    // On reçoit les jeux depuis api.js et on sauvegarde ceux qui ne sont pas encore en BDD, avec leurs plateformes et catégories
    public function save() {

        header('Content-Type: application/json');

        // On lit le contenu de la requête POST envoyée par api.js
        // file_get_contents lit le JSON brut envoyé par fetch()
        $body  = file_get_contents('php://input');
        $games = json_decode($body, true);

        // Si le corps est vide ou invalide on retourne un tableau vide
        if (empty($games)) {
            echo json_encode([]);
            exit;
        }

        $connexion = new Connexion();
        $pdo       = $connexion->getPDO();
        $model     = new GameModel($pdo);

        $savedGames = [];

        foreach ($games as $game) {

            $externalRef = $game['externalRef']      ?? null;
            $title       = $game['name']             ?? 'Inconnu';
            $releaseDate = $game['released']          ?? null;
            $image       = $game['background_image']  ?? '';

            if (!$externalRef) {
                continue;
            }

            // On vérifie si le jeu existe déjà en BDD avant de l'insérer
            // pour éviter les doublons
            $localId = $model->checkGame($externalRef);
            if (!$localId) {
                $localId = $model->insertGame($title, $releaseDate, $image, $externalRef, '');
            }

            // On sauvegarde les plateformes et on les associe au jeu
            if (!empty($game['platforms'])) {
                foreach ($game['platforms'] as $p) {
                    $plateforme   = $p['platform'];
                    $apiId        = $plateforme['id'];
                    $nomPlatform  = $plateforme['name'];

                    $idPlateforme = $model->checkExistingPlateforme($apiId);
                    if (!$idPlateforme) {
                        $idPlateforme = $model->insertPlateforme($nomPlatform, $apiId);
                    }
                    $model->linkGamePlateform($localId, $idPlateforme);
                }
            }

            // On sauvegarde les catégories et on les associe au jeu
            if (!empty($game['genres'])) {
                foreach ($game['genres'] as $genre) {
                    $idExterne   = $genre['id'];
                    $nameGenre   = $genre['name'];

                    $idCategorie = $model->checkExistingCategorie($idExterne);
                    if (!$idCategorie) {
                        $idCategorie = $model->insertCategorie($nameGenre, $idExterne);
                    }
                    $model->linkGameCat($localId, $idCategorie);
                }
            }

            // On retourne le jeu sauvegardé avec son id local
            // api.js s'en sert pour mettre à jour le lien de la carte affichée
            $savedGames[] = [
                'Id_Jeu'      => $localId,
                'externalRef' => $externalRef,
                'Titre'       => $title,
                'Date_Sortie' => $releaseDate,
                'Image'       => $image,
            ];
        }

        echo json_encode($savedGames);
        exit;
    }
}
