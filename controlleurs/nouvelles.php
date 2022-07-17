<?php

require_once './modeles/nouvelle.php';

class ControlleurNouvelle {

    /***
     * Fonction permettant d'afficher les 3 premières nouvelles 
     */
    function afficherListeTop3Actives() {
        $nouvelles = Nouvelle::ObtenirTop3Actives();
        require './vues/nouvelles/top3Actives.php';
    }

     /***
     * Fonction permettant d'afficher toute les nouvelles
     */
    function afficherListeToutesActives() {
        $nouvelles = Nouvelle::ObtenirToutesActives();
        require './vues/nouvelles/toutesActives.php';
    } 

    
     /***
     * Fonction permettant d'afficher une nouvelle
     */
    function afficherPage() {
        $nouvelle = Nouvelle::ObtenirUne($_GET['nouvelle_id']);
        require './vues/nouvelles/page.php';
    } 
}

?>