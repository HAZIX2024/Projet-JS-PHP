<?php

require_once __DIR__ . '/../../Models/Etudiant.php';
require_once __DIR__ . '/../../config/database.php';

$etudiant = new Etudiant($pdo);
$students = $etudiant->getAll();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Gestion Étudiants</title>
</head>
<body>

<h1>Liste des étudiants</h1>

<a href="add.php">Ajouter étudiant</a>

<table border="1" cellpadding="10">

    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Email</th>
        <th>Action</th>
    </tr>

    <?php foreach($students as $student): ?>

    <tr>
        <td><?= $student['id'] ?></td>
        <td><?= $student['nom'] ?></td>
        <td><?= $student['prenom'] ?></td>
        <td><?= $student['email'] ?></td>

        <td>
            <a href="../controllers/EtudiantController.php?delete=<?= $student['id'] ?>">
                Supprimer
            </a>
        </td>
    </tr>

    <?php endforeach; ?>

</table>

</body>
</html>