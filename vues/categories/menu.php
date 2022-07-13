<?php
    foreach ($categories as $categorie) {
?>
    <li><a class="dropdown-item" href="nouvelles_categorie.php?categorie_id=<?= $categorie->id ?>"><?= $categorie->categorie ?></a></li>
<?php
    }
?>