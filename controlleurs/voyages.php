<?php

require_once './modeles/voyage.php';

class ControlleurVoyage {

    /***
     * Fonction permettant de récupérer l'ensemble des voyages et de les afficher sous forme de tableau avec boutons d'actions
     */
    function afficherTableauAvecBoutonsAction() {
        $voyages = Voyage::ObtenirTous();
        require './vues/voyages/tableau-avec-bouton-actions.php';
    }

    /***
     * Fonction permettant de récupérer un voyage à partir de l'identifiant (id) 
     * inscrit dans l'URL, et l'affiche dans un formulaire pour édition
     */
    function afficherFormulaireEdition(){
        if(isset($_GET["id"])) {
            $voyage = Voyage::ObtenirUn($_GET["id"]);
            if($voyage) {  // ou if($voyage != null)
                require './vues/voyages/formulaireEdition.php';
            } else {
                $erreur = "Aucun voyage trouvé";
                echo $erreur;
            }
        } else {
            $erreur = "L'identifiant (id) du voyage à afficher est manquant dans l'url";
            echo $erreur;
        }
    }

    /***
     * Fonction permettant de récupérer un voyage à partir de l'identifiant (id) 
     * inscrit dans l'URL, et l'affiche dans un formulaire pour suppression
     */
    function afficherFormulaireSuppression(){
        if(isset($_GET["id"])) {
            $voyage = Voyage::ObtenirUn($_GET["id"]);
            if($voyage) {  // ou if($voyage != null)
                require './vues/voyages/formulaireSuppression.php';
            } else {
                $erreur = "Aucun voyage trouvé";
                echo $erreur;
            }
        } else {
            $erreur = "L'identifiant (id) du voyage à afficher est manquant dans l'url";
            echo $erreur;
        }
    }

    /***
     * Fonction permettant d'ajouter un voyage
     */
    function ajouter() {
        if(isset($_POST['titre']) && isset($_POST['description']) && isset($_POST['duree']) && isset($_POST['pays'])) {
            if(Voyage::ExistsPays($_POST['pays'])) {
                $message = Voyage::ajouter($_POST['titre'], $_POST['description'], $_POST['duree'], $_POST['pays']);
                echo $message;
            } else {
                $erreur = "Impossible d'ajouter un voyage. L'identifiant du pays est inconnu";
                echo $erreur;
            }
        } else {
            $erreur = "Impossible d'ajouter un voyage. Des informations sont manquantes";
            echo $erreur;
        }
    }

    /***
     * Fonction permettant de modifier un voyage
     */
    function editer() {
        if(isset($_GET['id']) && isset($_POST['titre']) && isset($_POST['description']) && isset($_POST['duree']) && isset($_POST['pays'])) {
            if(Voyage::ExistsPays($_POST['pays'])) {
                $message = Voyage::editer($_GET['id'], $_POST['titre'], $_POST['description'], $_POST['duree'], $_POST['pays']);
                echo $message;
            } else {
                $erreur = "Impossible de modifier un voyage. L'identifiant du pays est inconnu";
                echo $erreur;
            }
        } else {
            $erreur = "Impossible de modifier le voyage. Des informations sont manquantes";
            echo $erreur;
        }
    }

    /***
     * Fonction permettant de supprimer un voyage
     */
    function supprimer() {
        if(isset($_GET['id'])) {
            $message = Voyage::supprimer($_GET['id']);
            echo $message;
        } else {
            $erreur = "Impossible de supprimer le voyage. Des informations sont manquantes";
            echo $erreur;
        }
    }

}

?>