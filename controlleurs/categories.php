<?php

require_once './modeles/categorie.php';

class ControlleurCategorie {

    /***
     * Fonction permettant de récupérer l'ensemble des categories et de les afficher sous forme de liste dans le menu
     */
    function afficherListeMenu() {
        $categories = Categorie::ObtenirToutes();
        require './vues/categories/menu.php';
    }
}

?>