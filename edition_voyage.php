<?php include_once('include/header.php'); ?>
  <!-- Page Content -->
  <div class="container">
    <h1 class="my-4">Administration - Édition d'un voyage</h1>

    <?php
      require_once 'controlleurs/voyages.php';
      
      $controllerVoyage=new ControlleurVoyage;

      if (isset($_POST['boutonEditer'])) {      
          $controllerVoyage->editer();
      } 
    ?>

    <?php
         $controllerVoyage->afficherFormulaireEdition();
    ?>

    <a href="administration_voyages.php">Retour à la liste des voyages</a>

  </div>
<?php include_once('include/footer.php'); ?>