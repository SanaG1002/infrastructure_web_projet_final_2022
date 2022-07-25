<?php
    require_once 'controlleurs/authentification.php';

    if (isset($_POST['boutonConnexion'])) {        
        $controleurAuthentification=new ControlleurAuthentification;
        $controleurAuthentification->connecter();
    } else if (isset($_POST['boutonDeconnexion'])) { 
        $controleurAuthentification=new ControlleurAuthentification;
        $controleurAuthentification->deconnecter();
    }
?>

<?php if(!isset($_SESSION["utilisateur"])) { ?>
    <h2>Formulaire d'authentification</h2>
    <form method="POST">
        <label for="utilisateur_login_exemple">Utilisateur (exemple)</label>
        <input type="text" id="utilisateur_login_exemple" disabled value="sana">
        <br />

        <label for="mot_de_passe_login_exemple">Mot de passe (exemple)</label>
        <input type="text" id="mot_de_passe_login_exemple" disabled value="pw">
        <br />

        <!--
        <label for="mot_de_passe_crypte_login_exemple">Mot de passe crypte (exemple)</label>
        <input type="text" id="mot_de_passe_crypte_login_exemple" disabled value="<?= password_hash('pw', PASSWORD_DEFAULT) ?>">
        <br />
        -->

        <label for="utilisateur_login">Utilisateur</label>
        <input type="text" id="utilisateur_login" name="utilisateur_login" required>
        <br />

        <label for="mot_de_passe_login">Mot de passe</label>
        <input type="password" id="mot_de_passe_login" name="mot_de_passe_login" required>
        <br />

        <button name="boutonConnexion" type="submit" class="btn btn-primary">Connexion</button>
    </form>

<?php } else { ?>
    Vous êtes connecté en tant que <?= $_SESSION["utilisateur"] ?> 
        
    <form method="POST">
        <button name="boutonDeconnexion" type="submit" class="btn btn-primary">Déconnexion</button>
    </form>
<?php } ?>