<?php require_once "./include/config.php"; ?>
<?php include_once('include/header.php'); ?>

  <!-- Page Content -->
  <div class="container">
  
	<h1 class="my-4">Module personnel</h1>	
	<p>(Remplacez ce paragraphe par une courte phrase qui explique l'information qui est affichée par le module)</p>
	
  <?php 
    $mysqli = new mysqli(Db::$host, Db::$username, Db::$password, Db::$database);
    $resultatRequete = $mysqli->query("SELECT pays.nom, voyages.titre, voyages.description, voyages.duree FROM pays INNER JOIN voyages ON (pays.id = voyages.fk_pays) ORDER BY pays.nom ASC, voyages.titre ASC;");

    foreach ($resultatRequete as $enregistrement) {
  ?>
  <div class="d-flex flex-column">
  <h2> <?= $enregistrement['nom'] ?></h2>
    <div class="d-flex align-items-baseline w-100">
    <h4> <?= $enregistrement['titre'] ?></h4>
    <p class="ml-2"><?= $enregistrement['duree'] ?></p>
    </div>
    <p><?= $enregistrement['description'] ?></p>
</div>

  <?php 
    }
  ?>


	<!-- Affichez les enregistrement de la table que vous avez ajoutée à la base de données. -->
	
  </div>

<?php include_once('include/footer.php'); ?>
