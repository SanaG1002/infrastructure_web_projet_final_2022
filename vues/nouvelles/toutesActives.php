

<h2>Toute les nouvelles</h2>
 
<?php
    foreach ($nouvelles as $nouvelle) {
?>
<div class="list-group">
  <a type="button" href="nouvelle.php" class="list-group-item list-group-item-action m-2" aria-current="true">
   <p><?= $nouvelle->titre ?> - <?= $nouvelle->date_nouvelle ?></p>
   <p><?= $nouvelle->description_courte ?></p>
    </a>
</div>

<?php
    }
?>