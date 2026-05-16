<?php include "../layout/header.php"; ?>

<h3>Liste des matières</h3>

<a href="?controller=matiere&action=create">Ajouter matière</a>

<table>
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Coefficient</th>
        <th>Actions</th>
    </tr>

    <?php foreach ($matieres as $m) { ?>
        <tr>
            <td><?= $m->id ?></td>
            <td><?= $m->nom_matiere ?></td>
            <td><?= $m->coefficient ?></td>
            <td>
                <a href="?controller=matiere&action=delete&id=<?= $m->id ?>">Supprimer</a>
            </td>
        </tr>
    <?php } ?>
</table>

<?php include "../layout/footer.php"; ?>