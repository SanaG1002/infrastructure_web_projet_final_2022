<?php

require_once "./include/config.php";

class Nouvelle {
    public $id; 
    public $titre; 
    public $description_courte;
    public $description_longue;
    public $date_nouvelle;
    public $actif;

    /***
     * Fonction permettant de construire un objet de type nouvelle
     */
    public function __construct($id, $titre, $description_courte, $description_longue, $date_nouvelle, $actif) {
        $this->id = $id;
        $this->titre = $titre;
        $this->description_courte = $description_courte;
        $this->description_longue = $description_longue;
        $this->date_nouvelle = $date_nouvelle;
        $this->actif = $actif;
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
     * Fonction permettant de récupérer les 3 premieres nouvelles actives
     */
    public static function ObtenirTop3Actives() {
        $liste = [];
        $mysqli = self::connecter();

        $resultatRequete = $mysqli->query("SELECT id, titre, description_courte, description_longue, date_nouvelle, actif
        FROM nouvelles WHERE actif = 1 ORDER BY date_nouvelle DESC LIMIT 3;");

        foreach ($resultatRequete as $enregistrement) {
            $liste[] = new nouvelle(
              $enregistrement['id'], 
              $enregistrement['titre'], 
              $enregistrement['description_courte'], 
              $enregistrement['description_longue'],
              $enregistrement['date_nouvelle'], 
              $enregistrement['actif']
            );
        }

        return $liste;
    }

    /***
     * Fonction permettant de récupérer l'ensemble des nouvelles actives 
     */
    public static function ObtenirToutesActives() {
        $liste = [];
        $mysqli = self::connecter();

        $resultatRequete = $mysqli->query("SELECT id, titre, description_courte, description_longue, date_nouvelle, actif
        FROM nouvelles WHERE actif = 1 ORDER BY date_nouvelle DESC;");

        foreach ($resultatRequete as $enregistrement) {
            $liste[] = new nouvelle(
              $enregistrement['id'], 
              $enregistrement['titre'], 
              $enregistrement['description_courte'], 
              $enregistrement['description_longue'],
              $enregistrement['date_nouvelle'], 
              $enregistrement['actif']
            );
        }

        return $liste;
    }


}

?>