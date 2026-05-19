<?php include "../layout/header.php"; ?>

<h2>Modifier étudiant</h2>

<form method="POST">

    <input class="form-control mb-3"
           type="text"
           name="nom"
           value="<?= $etudiant->nom ?>">

    <input class="form-control mb-3"
           type="email"
           name="email"
           value="<?= $etudiant->email ?>">

    <button class="btn btn-warning">
        Modifier
    </button>

</form>

<?php include "../layout/footer.php"; ?>