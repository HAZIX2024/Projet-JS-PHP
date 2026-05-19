<?php include "../layout/header.php"; ?>

<h2>Bulletin étudiant</h2>

<div class="card p-4">
    <h4><?= $etudiant->nom ?></h4>

    <ul class="list-group">
        <?php foreach($notes as $n): ?>
            <li class="list-group-item">
                <?= $n->matiere ?> :
                <strong><?= $n->valeur ?></strong>
            </li>
        <?php endforeach; ?>
    </ul>

    <h3 class="mt-3">
        Moyenne : <?= $moyenne ?>
    </h3>
</div>

<?php include "../layout/footer.php"; ?>