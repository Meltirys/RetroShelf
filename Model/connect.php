<?php

require_once RACINE . '/Config/data.php';

class Connexion {

    private $conn;

    // On crée la connexion PDO avec les identifiants définis dans le fichier de config
    public function __construct() {
        try {

            $this->conn = new PDO(
                "mysql:host=" . DB_CONFIG['host'] . ";dbname=" . DB_CONFIG['dbname'] . ";charset=utf8",
                DB_CONFIG['username'],
                DB_CONFIG['password'],
            );

            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return $this->conn;

        }
		catch (Exception $e){
            displayError($e->getMessage());
        }

    }

    // On retourne l'objet PDO pour pouvoir faire des requêtes
    public function getPDO() {

        return $this->conn;

    }
}
?>
