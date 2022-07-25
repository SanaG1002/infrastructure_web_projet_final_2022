<?php

require_once './modeles/authentification.php';

class ControlleurAuthentification {
    
    /***
    * Fonction permettant à un utilisateur de se connecter
    */
    function connecter() {
        if(isset($_POST['utilisateur_login']) && isset($_POST['mot_de_passe_login'])) {
            $utilisateur = modele_authentification::ObtenirUn($_POST['utilisateur_login']);
            if($utilisateur) {            
                // Vérifier si le mot de passe soumis correspond au mot de passe stocké dans la base de données                
                if(password_verify($_POST['mot_de_passe_login'], $utilisateur->mot_de_passe)) {
                    // Stocker l'utilisateur dans la session
                    $_SESSION['utilisateur'] = $_POST['utilisateur_login'];
                    header('Location: .'); // recharge la page courante
                } else {
                    $erreur = "<b class='erreur'>Le mot de passe est incorrect</b>";
                    echo $erreur;
                }
            } else {
                $erreur = "L'utilisateur n'existe pas";
                echo $erreur;
            }
        } else {
            $erreur = "Impossible de se connecter. Des informations sont manquantes";
            echo $erreur;
        }
    }

    /***
    * Fonction permettant à un utilisateur de se connecter
    */
    function deconnecter() {
        if(isset($_SESSION["utilisateur"])) {
            unset($_SESSION["utilisateur"]);
            header('Location: .');  // recharge la page courante
        }
    }
}