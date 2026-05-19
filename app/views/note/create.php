<?php include "../layout/header.php"; ?>

<h3>Ajouter note</h3>

<form method="POST" action="?controller=note&action=store">

    ID Étudiant: <input type="number" name="etudiant_id"><br><br>
    ID Matière: <input type="number" name="matiere_id"><br><br>
    Note: <input type="number" step="0.01" name="note"><br><br>

    <button type="submit">Ajouter</button>
</form>

<?php include "../layout/footer.php"; ?>