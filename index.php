<?php
    require_once './controlleurs/nouvelles.php';
?>

<!doctype html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="css/styles.css">
  <title>Projet final infrastructure</title>
</head>

<body>

  <?php include_once('include/header.php'); ?>
  <!-- Page Content -->
  <div class="container">

    <h1 class="my-4">Projet final</h1>

    <!-- Marketing Icons Section -->


    <div class="row">
    <?php
      $controllerNouvelle = new ControlleurNouvelle;
      $controllerNouvelle->afficherListeTop3Actives();
    ?>
             </div>
    <!-- /.row -->

  </div>
  <!-- /.container -->

  <?php include_once('include/footer.php'); ?>
  <script>
    console.log('<?= $messagesLog ?>');
  </script>

</body>

</html>