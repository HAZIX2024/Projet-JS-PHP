<?php include "../layout/header.php"; ?>

<h2>Dashboard</h2>

<div class="row">

    <div class="col-md-4">
        <div class="card bg-primary text-white p-3">
            <h4><i class="fa fa-users"></i> Étudiants</h4>
            <p>Gestion des étudiants</p>
            <a href="?controller=etudiant" class="btn btn-light">Voir</a>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card bg-success text-white p-3">
            <h4><i class="fa fa-book"></i> Notes</h4>
            <p>Gestion des notes</p>
            <a href="?controller=note" class="btn btn-light">Voir</a>
        </div>
    </div>

</div>

<?php include "../layout/footer.php"; ?>