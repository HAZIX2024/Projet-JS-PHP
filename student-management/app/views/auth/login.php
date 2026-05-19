<?php include "../layout/header.php"; ?>

<div class="row justify-content-center">
    <div class="col-md-4">
        <div class="card shadow">
            <div class="card-header text-center">
                <h3>Connexion</h3>
            </div>
            <div class="card-body">
                <form method="POST">
                    <input class="form-control mb-3" type="text" name="username" placeholder="Username">

                    <input class="form-control mb-3" type="password" name="password" placeholder="Password">

                    <button class="btn btn-primary w-100">
                        <i class="fa fa-sign-in-alt"></i> Login
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include "../layout/footer.php"; ?>