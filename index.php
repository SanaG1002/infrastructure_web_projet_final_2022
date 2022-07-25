<?php include_once('include/header.php'); ?>
  <!-- Page Content -->
  <div class="container">

    <h1 class="my-4">Projet final</h1>

    <div class="row">
    <?php
      require_once './controlleurs/nouvelles.php';
      $controllerNouvelle = new ControlleurNouvelle;
      $controllerNouvelle->afficherListeTop3Actives();
    ?>
    </div>

  </div>

<?php include_once('include/footer.php'); ?>