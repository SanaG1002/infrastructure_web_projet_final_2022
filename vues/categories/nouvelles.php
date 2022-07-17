
<h1 class="my-4"><?= $categorie->categorie ?></h1>

<!-- Afficher la liste de toutes nouvelles ACTIVES appartenant à la catégorie sélectionnée en ordre chronologique (de la plus récente à la plus ancienne) -->
<!-- L'affichage est à votre discrétion -->
<ul>
<?php
    foreach ($nouvelles as $nouvelle) {
?>
    <li>
        <h2><?= $nouvelle->titre ?></h2>
    </li>
<?php
    }
?>
</ul>