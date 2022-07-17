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

    
    /***
     * Fonction permettant de récupérer une categorie en fonction de son identifiant  
     */
    public static function ObtenirUne($id) {
        $mysqli = self::connecter();

        if ($requete = $mysqli->prepare("SELECT * FROM categories WHERE id=?")) {  // Création d'une requête préparée 
            $requete->bind_param("s", $id); // Envoi des paramètres à la requête

            $requete->execute(); // Exécution de la requête

            $result = $requete->get_result(); // Récupération de résultats de la requête¸
            
            if($enregistrement = $result->fetch_assoc()) { // Récupération de l'enregistrement
                $categorie = new categorie(
                $enregistrement['id'], 
                $enregistrement['categorie']);
            } else {
                //echo "Erreur: Aucun enregistrement trouvé.";  // Pour fins de débogage
                return null;
            }   
            
            $requete->close(); // Fermeture du traitement 
        } else {
            echo "Une erreur a été détectée dans la requête utilisée : ";   // Pour fins de débogage
            echo $mysqli->error;
            return null;
        }

        return $categorie;
    }
}

?>