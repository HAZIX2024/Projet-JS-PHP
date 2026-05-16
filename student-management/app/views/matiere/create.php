<?php include "../layout/header.php"; ?>

<h3>Ajouter matière</h3>

<form method="POST" action="?controller=matiere&action=store">

    Nom matière: <input type="text" name="nom_matiere"><br><br>
    Coefficient: <input type="number" name="coefficient"><br><br>

    <button type="submit">Ajouter</button>
</form>

<?php include "../layout/footer.php"; ?>