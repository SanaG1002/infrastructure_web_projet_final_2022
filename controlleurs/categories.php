<?php

require_once './modeles/categorie.php';
require_once './modeles/nouvelle.php';

class ControlleurCategorie {

    /***
     * Fonction permettant de récupérer l'ensemble des categories et de les afficher sous forme de liste dans le menu
     */
    function afficherListeMenu() {
        $categories = Categorie::ObtenirToutes();
        require './vues/categories/menu.php';
    }

    /***
     * Fonction permettant de récupérer les nouvelles d'une categorie
     */
    function afficherNouvellesCategorie() {
        $categorie = Categorie::ObtenirUne($_GET['categorie_id']);
        $nouvelles = Nouvelle::ObtenirToutesActivesCategorie($_GET['categorie_id']);
        require './vues/categories/nouvelles.php';
    }
}

?>