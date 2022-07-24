<?php include_once('include/header.php'); ?>
  <!-- Page Content -->
  <div class="container">
    <h1 class="my-4">Administration - Ajouter un voyage</h1>

    <?php
      require_once 'controlleurs/voyages.php';
      
      if (isset($_POST['boutonAjouter'])) {        
          $controllerVoyage=new ControlleurVoyage;
          $controllerVoyage->ajouter();
      }
    ?>

    <form method="POST">
      <div>
        <div>
          <label for="titre">Titre *</label>
          <!-- Attention! Vos validations doivent être cohérentes avec le champ correspondant dans la BD! -->
          <input type="text" id="titre" name="titre" required maxlength="60" value="">
        </div>
        <div>
          <label for="description">Description *</label>
          <!-- Attention! Vos validations doivent être cohérentes avec le champ correspondant dans la BD! -->
          <textarea id="description" name="description" class="form-control" rows="5" required></textarea>
        </div>
        <div>
          <label for="duree">Duree *</label>
          <!-- Attention! Vos validations doivent être cohérentes avec le champ correspondant dans la BD! -->
          <input type="text" id="duree" name="duree" required maxlength="10" value="">
        </div>
        <div>
          <label for="pays">Pays *</label>
          <!-- Attention! Vos validations doivent être cohérentes avec le champ correspondant dans la BD! -->
          <input type="text" id="pays" name="pays" required value="">
        </div>
      </div>

      <button name="boutonAjouter" type="submit">Ajouter le voyage</button><br>
    </form>

    <a href="administration_voyages.php">Retour à la liste des voyages</a>

  </div>
<?php include_once('include/footer.php'); ?>