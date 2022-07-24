<?php

require_once "./include/config.php";

class Voyage {
    public $id; 
    public $titre; 
    public $description;
    public $duree;
    public $pays;

    /***
     * Fonction permettant de construire un objet de type voyage
     */
    public function __construct($id, $titre, $description, $duree, $pays) {
        $this->id = $id;
        $this->titre = $titre;
        $this->description = $description;
        $this->duree = $duree;
        $this->pays = $pays;
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
     * Fonction permettant de récupérer l'ensemble des voyages 
     */
    public static function ObtenirTous() {
        $liste = [];
        $mysqli = self::connecter();

        $resultatRequete = $mysqli->query("SELECT id, titre, description, duree, fk_pays FROM voyages ORDER BY titre");

        foreach ($resultatRequete as $enregistrement) {
            $liste[] = new voyage(
                $enregistrement['id'], 
                $enregistrement['titre'], 
                $enregistrement['description'], 
                $enregistrement['duree'],
                $enregistrement['fk_pays']
            );
        }

        return $liste;
    }

    /***
     * Fonction permettant de récupérer un voyage en fonction de son identifiant
     */
    public static function ObtenirUn($id) {
        $mysqli = self::connecter();

        if ($requete = $mysqli->prepare("SELECT * FROM voyages WHERE id=?")) {  // Création d'une requête préparée 
            $requete->bind_param("s", $id); // Envoi des paramètres à la requête

            $requete->execute(); // Exécution de la requête

            $result = $requete->get_result(); // Récupération de résultats de la requête¸
            
            if($enregistrement = $result->fetch_assoc()) { // Récupération de l'enregistrement
                $voyage = new voyage(
                    $enregistrement['id'], 
                    $enregistrement['titre'], 
                    $enregistrement['description'], 
                    $enregistrement['duree'],
                    $enregistrement['fk_pays'],
                );
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

        return $voyage;
    }

    /***
     * Fonction permettant d'ajouter un voyage
     */
    public static function ajouter($titre, $description, $duree, $pays) {
        $message = '';

        $mysqli = self::connecter();
        
        // Création d'une requête préparée
        if ($requete = $mysqli->prepare("INSERT INTO voyages(titre, description, duree, fk_pays) VALUES(?, ?, ?, ?)")) {      

        /************************* ATTENTION **************************/
        /* On ne fait présentement peu de validation des données.     */
        /* On revient sur cette partie dans les prochaines semaines!! */
        /**************************************************************/

        $requete->bind_param("ssss", $titre, $description, $duree, $pays);

        if($requete->execute()) { // Exécution de la requête
            $message = "Voyage ajouté";  // Message ajouté dans la page en cas d'ajout réussi
        } else {
            $message =  "Une erreur est survenue lors de l'ajout: " . $requete->error;  // Message ajouté dans la page en cas d’échec
        }

        $requete->close(); // Fermeture du traitement

        } else  {
            echo "Une erreur a été détectée dans la requête utilisée : ";   // Pour fins de débogage
            echo $mysqli->error;
            echo "<br>";
            exit();
        }

        return $message;
    }

    /***
     * Fonction permettant d'éditer un voyage
     */
    public static function editer($id, $titre, $description, $duree, $pays) {
        $message = '';

        $mysqli = self::connecter();
        
        // Création d'une requête préparée
        if ($requete = $mysqli->prepare("UPDATE voyages SET titre=?, description=?, duree=?, fk_pays=? WHERE id=?")) {      

        /************************* ATTENTION **************************/
        /* On ne fait présentement peu de validation des données.     */
        /* On revient sur cette partie dans les prochaines semaines!! */
        /**************************************************************/

        $requete->bind_param("ssssi", $titre, $description, $duree, $pays, $id);

        if($requete->execute()) { // Exécution de la requête
            $message = "Voyage modifié";  // Message ajouté dans la page en cas d'ajout réussi
        } else {
            $message =  "Une erreur est survenue lors de l'édition: " . $requete->error;  // Message ajouté dans la page en cas d’échec
        }

        $requete->close(); // Fermeture du traitement

        } else  {
            echo "Une erreur a été détectée dans la requête utilisée : ";
            echo $mysqli->error;
            echo "<br>";
            exit();
        }

        return $message;
    }

    /***
     * Fonction permettant de supprimer un voyage
     */
    public static function supprimer($id) {
        $message = '';

        $mysqli = self::connecter();
        
        // Création d'une requête préparée
        if ($requete = $mysqli->prepare("DELETE FROM voyages WHERE id=?")) {      

        /************************* ATTENTION **************************/
        /* On ne fait présentement peu de validation des données.     */
        /* On revient sur cette partie dans les prochaines semaines!! */
        /**************************************************************/

        $requete->bind_param("i", $id);

        if($requete->execute()) { // Exécution de la requête
            $message = "Voyage supprimé";  // Message ajouté dans la page en cas d'ajout réussi
        } else {
            $message =  "Une erreur est survenue lors de la suppression: " . $requete->error;  // Message ajouté dans la page en cas d’échec
        }

        $requete->close(); // Fermeture du traitement

        } else  {
            echo "Une erreur a été détectée dans la requête utilisée : ";
            echo $mysqli->error;
            echo "<br>";
            exit();
        }

        return $message;
    }

    /***
     * Fonction permettant de savoir si un pays existe en fonction de son identifiant
     */
    public static function ExistsPays($id) {
        $mysqli = self::connecter();

        if ($requete = $mysqli->prepare("SELECT * FROM pays WHERE id=?")) {  // Création d'une requête préparée 
            $requete->bind_param("s", $id); // Envoi des paramètres à la requête

            $requete->execute(); // Exécution de la requête

            $result = $requete->get_result(); // Récupération de résultats de la requête¸
            
            if($enregistrement = $result->fetch_assoc()) { // Récupération de l'enregistrement
                $exists = true;
            } else {
                //echo "Erreur: Aucun enregistrement trouvé.";  // Pour fins de débogage
                return false;
            }   
            
            $requete->close(); // Fermeture du traitement 
        } else {
            echo "Une erreur a été détectée dans la requête utilisée : ";   // Pour fins de débogage
            echo $mysqli->error;
            return false;
        }

        return $exists;
    }
}

?>