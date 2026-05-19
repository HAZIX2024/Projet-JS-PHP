<?php
session_start();

if (isset($_SESSION['user_id'])) {
    header("Location: /student-management/app/views/dashboard/index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription - Student Management</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #198754, #0d6efd);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: Arial, sans-serif;
        }

        .signup-card {
            width: 100%;
            max-width: 460px;
            background: white;
            border-radius: 18px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
            padding: 35px;
        }

        .signup-icon {
            width: 70px;
            height: 70px;
            background: #198754;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            font-size: 28px;
        }

        .form-control, .form-select {
            height: 48px;
            border-radius: 10px;
        }

        .btn-signup {
            height: 48px;
            border-radius: 10px;
            font-weight: bold;
        }

        .small-link {
            text-decoration: none;
        }
    </style>
</head>

<body>

<div class="signup-card">
    <div class="signup-icon">
        <i class="fa fa-user-plus"></i>
    </div>

    <h3 class="text-center mb-1">Créer un compte</h3>
    <p class="text-center text-muted mb-4">Inscription à Student Management</p>

    <?php if (isset($_GET['error'])): ?>
        <div class="alert alert-danger text-center">
            Ce username existe déjà ou une erreur est survenue.
        </div>
    <?php endif; ?>

    <form method="POST" action="/student-management/app/controllers/UserController.php">
        <div class="mb-3">
            <label class="form-label">Nom d'utilisateur</label>
            <input class="form-control" 
                   type="text" 
                   name="username" 
                   placeholder="Choisissez un username"
                   required>
        </div>

        <div class="mb-3">
            <label class="form-label">Mot de passe</label>
            <input class="form-control" 
                   type="password" 
                   name="password" 
                   placeholder="Choisissez un mot de passe"
                   required>
        </div>

        <div class="mb-3">
            <label class="form-label">Rôle</label>
            <select class="form-select" name="role" required>
                <option value="user">Utilisateur</option>
                <option value="admin">Admin</option>
            </select>
        </div>

        <button class="btn btn-success w-100 btn-signup" name="signup">
            <i class="fa fa-user-plus"></i> S'inscrire
        </button>
    </form>

    <p class="text-center mt-4 mb-0">
        Vous avez déjà un compte ?
        <a href="login.php" class="small-link">Se connecter</a>
    </p>
</div>

</body>
</html>