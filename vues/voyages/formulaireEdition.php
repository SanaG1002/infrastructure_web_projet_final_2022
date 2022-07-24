<form method="POST">
    <div>
        <div>
            <label for="titre">Titre *</label>
            <!-- Attention! Vos validations doivent être cohérentes avec le champ correspondant dans la BD! -->
            <input type="text" id="titre" name="titre" required maxlength="60" value="<?= $voyage->titre ?>">
        </div>
        <div>
            <label for="description">Description *</label>
            <!-- Attention! Vos validations doivent être cohérentes avec le champ correspondant dans la BD! -->
            <textarea id="description" name="description" class="form-control" rows="5" required><?= $voyage->description ?></textarea>
        </div>
        <div>
            <label for="duree">Duree *</label>
            <!-- Attention! Vos validations doivent être cohérentes avec le champ correspondant dans la BD! -->
            <input type="text" id="duree" name="duree" required maxlength="10" value="<?= $voyage->duree ?>">
        </div>
        <div>
            <label for="pays">Pays *</label>
            <!-- Attention! Vos validations doivent être cohérentes avec le champ correspondant dans la BD! -->
            <input type="text" id="pays" name="pays" required value="<?= $voyage->pays ?>">
        </div>
    </div>

    <button name="boutonEditer" type="submit">Modifier le produit</button><br>
</form>                         