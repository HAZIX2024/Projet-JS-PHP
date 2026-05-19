<?php include "../layout/header.php"; ?>

<h3>Utilisateurs</h3>

<a href="?controller=user&action=create">Ajouter utilisateur</a>

<table>
    <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Role</th>
        <th>Actions</th>
    </tr>

    <?php foreach ($users as $u) { ?>
        <tr>
            <td><?= $u->id ?></td>
            <td><?= $u->username ?></td>
            <td><?= $u->role ?></td>
            <td>
                <a href="?controller=user&action=delete&id=<?= $u->id ?>">Supprimer</a>
            </td>
        </tr>
    <?php } ?>
</table>

<?php include "../layout/footer.php"; ?>