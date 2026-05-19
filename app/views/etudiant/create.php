<?php include "../layout/header.php"; ?>

<h3>Ajouter étudiant</h3>

<form method="POST" action="?controller=etudiant&action=store">

    Nom: <input type="text" name="nom"><br><br>
    Prénom: <input type="text" name="prenom"><br><br>
    Email: <input type="email" name="email"><br><br>

    <button type="submit">Ajouter</button>
</form>

<?php include "../layout/footer.php"; ?>