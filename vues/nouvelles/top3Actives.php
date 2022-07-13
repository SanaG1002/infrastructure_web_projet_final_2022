<?php
    foreach ($nouvelles as $nouvelle) {
?>
<div class="col-lg-4 mb-4">
<div class="card h-100">
    <h4 class="card-header"><?= $nouvelle->titre ?></h4>
    <div class="card-body">
    <h6 class="card-title"><?= $nouvelle->date_nouvelle ?></h6>
    <p class="card-text"><?= $nouvelle->description_courte ?></p>
    </div>
    <div class="card-footer">
    <a href="nouvelle.php" class="btn btn-primary">Plus d'information</a>
    </div>
    </div>
</div>
<?php
    }
?>