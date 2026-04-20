<?php

class GameModel {

    private $pdo;

    // On stocke la connexion PDO pour pouvoir l'utiliser dans toutes les méthodes
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // On cherche les jeux dont le titre contient le mot-clé saisi
    public function searchGames($keyword) {
        try {

        $query = "SELECT Id_Jeu, Titre, Date_Sortie, Image, RefExterne
                  FROM Jeu
                  WHERE Titre LIKE :keyword";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([':keyword' => '%' . $keyword . '%']);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            return [];
        }

    }

    // On vérifie si un jeu existe déjà en BDD grâce à sa référence RAWG, pour éviter les doublons
    public function checkGame($externalRef) {
        try {

        $query = "SELECT Id_Jeu FROM Jeu WHERE RefExterne = :ref";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([':ref' => $externalRef]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ? $result['Id_Jeu'] : false;
        }catch(PDOException $e) {
            return false;
        }

    }

    // On insère un nouveau jeu en BDD avec toutes ses infos et on retourne son id
    public function insertGame($title, $releaseDate, $image, $externalRef, $description) {
        try {

        $query = "INSERT INTO Jeu (Titre, Date_Sortie, Image, RefExterne, Description)
                  VALUES (:title, :releaseDate, :image, :ref, :description)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([
            ':title'       => $title,
            ':releaseDate' => $releaseDate,
            ':image'       => $image,
            ':ref'         => $externalRef,
            ':description' => $description
        ]);
        // On retourne l'id du dernier jeu insérer
        return $this->pdo->lastInsertId();
        } catch(PDOException $e) {
            return false;
        }

    }

    // On récupère toutes les infos d'un jeu par son id pour construire la fiche détaillée
    public function getGameById($id) {
        try {

        $query = "SELECT * FROM Jeu WHERE Id_Jeu = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([':id' => $id]);
        // On retourne un tableau associatif avec l'ensemble de la table Jeu
        return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            return false;
        }

    }

    // On sauvegarde la description en BDD pour ne pas rappeler l'API à chaque visite
    public function updateDescription($idJeu, $description) {
        try {

        $query = "UPDATE Jeu SET Description = :description WHERE Id_Jeu = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([
            ':description' => $description,
            ':id'          => $idJeu
        ]);
        } catch(PDOException $e) {
            return;
        }
    }

    // On vérifie si une plateforme existe déjà en BDD via son id RAWG
    public function checkExistingPlateforme($apiId) {
        try {

        $query = "SELECT Id_Plateforme FROM Plateforme WHERE api_id = :apiId";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([':apiId' => $apiId]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ? $result['Id_Plateforme'] : false;
        } catch(PDOException $e) {
            return false;
        }

    }

    // On insère une nouvelle plateforme et on retourne son id
    public function insertPlateforme($nom, $apiId) {
        try {

        $query = "INSERT INTO Plateforme (Nom_plateforme, api_id)
                  VALUES (:nom, :apiId)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([
            ':nom'   => $nom,
            ':apiId' => $apiId
        ]);
        return $this->pdo->lastInsertId();
        } catch(PDOException $e) {
            return false;
        }

    }

    // On lie un jeu à une plateforme dans la table Publier, si ce lien n'existe pas déjà
    public function linkGamePlateform($idJeu, $idPlateforme) {
        try {
        $check = "SELECT COUNT(*) FROM Publier
                  WHERE Id_Jeu = :idJeu AND Id_Plateforme = :idPlateforme";
        $stmt = $this->pdo->prepare($check);
        $stmt->execute([':idJeu' => $idJeu, ':idPlateforme' => $idPlateforme]);

        if ($stmt->fetchColumn() == 0) {
            $query = "INSERT INTO Publier (Id_Jeu, Id_Plateforme)
                      VALUES (:idJeu, :idPlateforme)";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([':idJeu' => $idJeu, ':idPlateforme' => $idPlateforme]);
        }
        } catch(PDOException $e) {
            return;
        }

    }

    // On récupère toutes les plateformes associées à un jeu
    public function getPlateformperGame($idJeu) {
        try {

    $query = "SELECT Plateforme.Nom_plateforme
              FROM Plateforme
              JOIN Publier ON Plateforme.Id_Plateforme = Publier.Id_Plateforme
              WHERE Publier.Id_Jeu = :idJeu";
    $stmt = $this->pdo->prepare($query);
    $stmt->execute([':idJeu' => $idJeu]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch(PDOException $e) {
            return [];
        }

    }

    // On vérifie si une catégorie existe déjà en BDD via son id RAWG
    public function checkExistingCategorie($idExterne) {
        try {

        $query = "SELECT Id_Categorie FROM Categorie WHERE id_externe = :idExterne";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([':idExterne' => $idExterne]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result ? $result['Id_Categorie'] : false;
        } catch(PDOException $e) {
            return false;
        }

    }

    // On insère une nouvelle catégorie et on retourne son id
    public function insertCategorie($nom, $idExterne) {
        try {

        $query = "INSERT INTO Categorie (Nom_categorie, id_externe)
                  VALUES (:nom, :idExterne)";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([
            ':nom'       => $nom,
            ':idExterne' => $idExterne
        ]);
        return $this->pdo->lastInsertId();
        } catch(PDOException $e) {
            return false;
        }

    }

    // On lie un jeu à une catégorie dans la table Classer, si ce lien n'existe pas déjà
    public function linkGameCat($idJeu, $idCategorie) {
        try {

        $check = "SELECT COUNT(*) FROM Classer
                  WHERE Id_Jeu = :idJeu AND Id_Categorie = :idCategorie";
        $stmt = $this->pdo->prepare($check);
        $stmt->execute([':idJeu' => $idJeu, ':idCategorie' => $idCategorie]);

        if ($stmt->fetchColumn() == 0) {
            $query = "INSERT INTO Classer (Id_Jeu, Id_Categorie)
                      VALUES (:idJeu, :idCategorie)";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([':idJeu' => $idJeu, ':idCategorie' => $idCategorie]);

        }
        }catch(PDOException $e) {
            return;
        }
    }

    // On récupère toutes les catégories associées à un jeu
    public function getCatperGame($idJeu) {
        try {
    $query = "SELECT Categorie.Nom_categorie
              FROM Categorie
              JOIN Classer ON Categorie.Id_Categorie = Classer.Id_Categorie
              WHERE Classer.Id_Jeu = :idJeu";
    $stmt = $this->pdo->prepare($query);
    $stmt->execute([':idJeu' => $idJeu]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);

        } catch(PDOException $e){
            return [];
        }

    }

    // On récupère la description depuis l'API RAWG si elle n'est pas encore en BDD, puis on la sauvegarde
    public function Description($jeu) {
        $apiData = null;
        $apikey  = 'aff19c69f16a42eb8b4902a215f4762d';
        $url     = "https://api.rawg.io/api/games/{$jeu['RefExterne']}?key={$apikey}";

        // On appelle l'API et on récupère un texte JSON de la réponse
        $response = @file_get_contents($url);

        if ($response !== false) {
            $apiData = json_decode($response, true);

            // Si la description est vide en BDD on la sauvegarde pour ne plus rappeler l'API
            if (empty($jeu['Description']) && !empty($apiData['description_raw'])) {
                $this->updateDescription($jeu['Id_Jeu'], $apiData['description_raw']);
                $jeu['Description'] = $apiData['description_raw'];
            }
        }

        // On retourne la description à la page affichée
        return $jeu['Description'];
    }

    // On met à jour le titre, la date de sortie et l'image d'un jeu depuis le formulaire admin
    function updateGame($id, $title, $releaseDate, $image) {
        try {

        $query = "UPDATE Jeu SET Titre = :title, Date_Sortie = :releaseDate, Image =:image
                  WHERE Id_Jeu = :id";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([
            ':title' => $title,
            ':releaseDate' => $releaseDate,
            ':image' => $image,
            ':id' => $id
        ]);
        } catch(PDOException $e) {
            return;
        }

    }

}
?>
