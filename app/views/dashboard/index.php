<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../auth/login.php");
    exit;
}

include "../layout/header.php";
?>

<h2>Dashboard</h2>

<p>Bienvenue, <?php echo $_SESSION['username']; ?> 👋</p>

<a href="/student-management/app/views/auth/logout.php" class="btn btn-danger mb-3">
    <i class="fa fa-sign-out-alt"></i> Logout
</a>

<div class="row">

    <div class="col-md-4">
        <div class="card bg-primary text-white p-3">
            <h4><i class="fa fa-users"></i> Étudiants</h4>
            <p>Gestion des étudiants</p>
            <a href="/student-management/app/views/etudiant/index.php" class="btn btn-light">Voir</a>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card bg-success text-white p-3">
            <h4><i class="fa fa-book"></i> Notes</h4>
            <p>Gestion des notes</p>
            <a href="/student-management/app/views/note/index.php" class="btn btn-light">Voir</a>
        </div>
    </div>

</div>

<?php include "../layout/footer.php"; ?>