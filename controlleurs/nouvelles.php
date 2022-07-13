<?php

require_once './modeles/nouvelle.php';

class ControlleurNouvelle {

    /***
     * Fonction permettant de récupérer l'ensemble des produits et de les afficher sous forme de liste
     */
    function afficherListeTop3Actives() {
        $nouvelles = Nouvelle::ObtenirTop3Actives();
        require './vues/nouvelles/top3Actives.php';
    }
}

?>