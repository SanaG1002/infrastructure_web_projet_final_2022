<?php

require_once "./include/config.php";

class Categorie {
    public $id; 
    public $categorie; 

    /***
     * Fonction permettant de construire un objet de type categorie
     */
    public function __construct($id, $categorie) {
        $this->id = $id;
        $this->categorie = $categorie;
    }
    
    /***
     * Fonction permettant de se connecter à la base de données
     */
    static function connecter() {
        
        $mysqli = new mysqli(Db::$host, Db::$username, Db::$password, Db::$database);

        // Vérifier la connexion
        if ($mysqli -> connect_errno) {
            echo "Échec de connexion à la base de données MySQL: " . $mysqli -> connect_error;   // Pour fins de débogage
            exit();
        } 

        return $mysqli;
    }

    /***
     * Fonction permettant de récupérer l'ensemble des categories actives  
     */
    public static function ObtenirToutes() {
        $liste = [];
        $mysqli = self::connecter();

        $resultatRequete = $mysqli->query("SELECT id, categorie FROM categories;");

        foreach ($resultatRequete as $enregistrement) {
            $liste[] = new categorie($enregistrement['id'], $enregistrement['categorie']);
        }

        return $liste;
    }
}

?>