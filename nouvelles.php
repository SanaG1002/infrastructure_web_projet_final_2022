<?php
    require_once './controlleurs/nouvelles.php';
?>

<?php include_once('include/header.php'); ?>


  <!-- Page Content -->
  <div class="container">

  <?php
      $controllerNouvelle = new ControlleurNouvelle;
      $controllerNouvelle->afficherListeToutesActives();
    ?>
  </div>

<?php include_once('include/footer.php'); ?>
