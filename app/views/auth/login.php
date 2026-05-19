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
    <title>Connexion - Student Management</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #0d6efd, #6610f2);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: Arial, sans-serif;
        }

        .login-card {
            width: 100%;
            max-width: 430px;
            background: white;
            border-radius: 18px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
            padding: 35px;
        }

        .login-icon {
            width: 70px;
            height: 70px;
            background: #0d6efd;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            font-size: 28px;
        }

        .form-control {
            height: 48px;
            border-radius: 10px;
        }

        .btn-login {
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

<div class="login-card">
    <div class="login-icon">
        <i class="fa fa-graduation-cap"></i>
    </div>

    <h3 class="text-center mb-1">Connexion</h3>
    <p class="text-center text-muted mb-4">Bienvenue dans Student Management</p>

    <?php if (isset($_GET['error'])): ?>
        <div class="alert alert-danger text-center">
            Username ou password incorrect.
        </div>
    <?php endif; ?>

    <?php if (isset($_GET['registered'])): ?>
        <div class="alert alert-success text-center">
            Compte créé avec succès. Vous pouvez vous connecter.
        </div>
    <?php endif; ?>

    <form method="POST" action="/student-management/app/controllers/UserController.php">
        <div class="mb-3">
            <label class="form-label">Nom d'utilisateur</label>
            <input class="form-control" 
                   type="text" 
                   name="username" 
                   placeholder="Entrez votre username"
                   required>
        </div>

        <div class="mb-3">
            <label class="form-label">Mot de passe</label>
            <input class="form-control" 
                   type="password" 
                   name="password" 
                   placeholder="Entrez votre mot de passe"
                   required>
        </div>

        <button class="btn btn-primary w-100 btn-login" name="login">
            <i class="fa fa-sign-in-alt"></i> Se connecter
        </button>
    </form>

    <p class="text-center mt-4 mb-0">
        Vous n'avez pas de compte ?
        <a href="signup.php" class="small-link">Créer un compte</a>
    </p>
</div>

</body>
</html>