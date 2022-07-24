<!-- Affichage en mode "tableau" -->
<table>
    <tr>
        <th>Titre</th>        
        <th>Description</th>        
        <th>Duree</th>        
        <th>Actions</th>
    </tr>

    <?php
        foreach ($voyages as $voyage) {
    ?>
        <tr>
            <td><?= $voyage->titre ?></td>
            <td><?= $voyage->description?></td>
            <td><?= $voyage->duree ?></td>
            <td>
                <a href="edition_voyage.php?id=<?= $voyage->id ?>">Modifier</a> 
                | 
                <a href="suppression_voyage.php?id=<?= $voyage->id ?>">Supprimer</a>
            </td>
        </tr>
    <?php
        }
    ?>
</table>