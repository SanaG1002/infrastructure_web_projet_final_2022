<?php include_once('include/header.php'); ?>
  <!-- Page Content -->
  <div class="container">
    <h1 class="my-4">Administration - Voyages</h1>
    
    <a href="ajout_voyage.php" class="btn btn-primary float-right" aria-label="Ajouter un voyage">
      Ajouter un voyage
    </a>

    <?php
        require_once 'controlleurs/voyages.php';
        $controllerVoyage=new ControlleurVoyage;
        $controllerVoyage->afficherTableauAvecBoutonsAction();
    ?>
	
  </div>

<?php include_once('include/footer.php'); ?>