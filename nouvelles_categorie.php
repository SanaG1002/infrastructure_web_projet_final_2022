<?php
    require_once './controlleurs/categories.php';
?>

<?php include_once('include/header.php'); ?>

  <!-- Page Content -->
  <div class="container">
  <?php
      $controllerCategorie = new ControlleurCategorie;
      $controllerCategorie->afficherNouvellesCategorie();
    ?>
  </div>

<?php include_once('include/footer.php'); ?>

