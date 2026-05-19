<?php include "../layout/header.php"; ?>

<h3>Liste des notes</h3>

<a href="?controller=note&action=create">Ajouter note</a>

<table>
    <tr>
        <th>ID</th>
        <th>Étudiant</th>
        <th>Matière</th>
        <th>Note</th>
        <th>Actions</th>
    </tr>

    <?php foreach ($notes as $n) { ?>
        <tr>
            <td><?= $n->id ?></td>
            <td><?= $n->etudiant_id ?></td>
            <td><?= $n->matiere_id ?></td>
            <td><?= $n->note ?></td>
            <td>
                <a href="?controller=note&action=delete&id=<?= $n->id ?>">Supprimer</a>
            </td>
        </tr>
    <?php } ?>
</table>

<?php include "../layout/footer.php"; ?>