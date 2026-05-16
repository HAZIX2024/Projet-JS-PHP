<!DOCTYPE html>
<html>
<head>
    <title>Ajouter étudiant</title>
</head>
<body>

<h1>Ajouter étudiant</h1>

<form action="../controllers/EtudiantController.php" method="POST">

    <input type="text" name="nom" placeholder="Nom" required>
    <br><br>

    <input type="text" name="prenom" placeholder="Prénom" required>
    <br><br>

    <input type="email" name="email" placeholder="Email" required>
    <br><br>

    <button type="submit" name="add">
        Ajouter
    </button>

</form>

</body>
</html>