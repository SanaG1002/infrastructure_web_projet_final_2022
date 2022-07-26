<?php require_once "./include/config.php"; ?>
<?php include_once('include/header.php'); ?>

  <!-- Page Content -->
  <div class="container">
  
	<h1 class="my-4">Voyages</h1>	
	<p>Description des voyages que nous proposons</p>
	
  <?php 
    $mysqli = new mysqli(Db::$host, Db::$username, Db::$password, Db::$database);
    $resultatRequete = $mysqli->query("SELECT pays.nom, voyages.titre, voyages.description, voyages.duree FROM pays INNER JOIN voyages ON (pays.id = voyages.fk_pays) ORDER BY pays.nom ASC, voyages.titre ASC;");

    foreach ($resultatRequete as $enregistrement) {
  ?>
  <div class="d-flex flex-column">
  <h3> <?= $enregistrement['nom'] ?></h3>
    <div class="d-flex align-items-baseline w-100">
    <h5> <?= $enregistrement['titre'] ?> - <?= $enregistrement['duree'] ?></h5>
    <p></p>
    </div>
    <p><?= $enregistrement['description'] ?></p>
</div>

  <?php 
    }
  ?>


	<!-- Affichez les enregistrement de la table que vous avez ajoutée à la base de données. -->
	
  </div>

<?php include_once('include/footer.php'); ?>
