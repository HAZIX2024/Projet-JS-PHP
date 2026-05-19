<?php include "../layout/header.php"; ?>

<h3>Liste des étudiants</h3>

<a href="?controller=etudiant&action=create">Ajouter étudiant</a>

<table>
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Email</th>
        <th>Actions</th>
    </tr>

    <?php foreach ($etudiants as $e) { ?>
        <tr>
            <td><?= $e->id ?></td>
            <td><?= $e->nom ?></td>
            <td><?= $e->prenom ?></td>
            <td><?= $e->email ?></td>
            <td>
                <a href="?controller=etudiant&action=show&id=<?= $e->id ?>">Voir</a>
                <a href="?controller=etudiant&action=delete&id=<?= $e->id ?>">Supprimer</a>
            </td>
        </tr>
    <?php } ?>
</table>

<?php include "../layout/footer.php"; ?>