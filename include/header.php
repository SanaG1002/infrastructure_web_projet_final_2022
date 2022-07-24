
<?php
    require_once './controlleurs/categories.php';
?>

<!DOCTYPE html>
<html lang="fr-CA">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Titre de la page</title>
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <link rel="stylesheet" href="css/styles.css">
</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg bg-light">
  <div class="container">
    <a class="navbar-brand" href="index.php">Accueil</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

      
                
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Nouvelles
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

            <?php
              $controllerCategorie = new ControlleurCategorie;
              $controllerCategorie->afficherListeMenu();
            ?>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="nouvelles.php">Toutes les nouvelles</a></li>
    
          </ul>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="voyages.php">Voyages</a>
        </li>

        <!-- Le menu Administration doit s'afficher seulement lorsque l'utilisateur est connecté !-->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Administration
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="administration_nouvelles.php">Nouvelles</a></li>
            <li><a class="dropdown-item" href="administration_voyages.php">Voyages</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <button class="btn btn-outline-info my-2 my-sm-0" data-bs-toggle="modal" data-bs-target="#modalConnexion">Connexion</button>					
        </li>

      </ul>
    </div>
  </div>
</nav>
  
<!-- Formulaire de connexion -->
<div class="modal" id="modalConnexion" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
	<div class="modal-content">
	  <div class="modal-header">
		<h5 class="modal-title">Connexion</h5>
		<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	  </div>
	  <div class="modal-body">
		Formulaire de connexion
	  </div>
	  <div class="modal-footer">
		<button type="submit" class="btn btn-primary">Connexion</button>
		<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
	  </div>
	</div>
  </div>
</div>	