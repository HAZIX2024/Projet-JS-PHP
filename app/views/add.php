<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un étudiant</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f0f2f5;
            color: #333;
            min-height: 100vh;
        }

        header {
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            padding: 20px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0,0,0,0.2);
        }

        header h1 { font-size: 1.6rem; }

        .btn-back {
            padding: 10px 20px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9rem;
            background: white;
            color: #667eea;
            transition: all 0.2s;
        }

        .btn-back:hover { background: #f0f0f0; }

        .container {
            max-width: 520px;
            margin: 60px auto;
            padding: 0 20px;
        }

        .card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 4px 30px rgba(0,0,0,0.1);
            overflow: hidden;
        }

        .card-header {
            background: linear-gradient(135deg, #667eea, #764ba2);
            padding: 30px;
            text-align: center;
            color: white;
        }

        .card-header .icon {
            font-size: 2.5rem;
            margin-bottom: 10px;
        }

        .card-header h2 {
            font-size: 1.4rem;
            font-weight: 600;
        }

        .card-header p {
            font-size: 0.9rem;
            opacity: 0.85;
            margin-top: 4px;
        }

        .card-body {
            padding: 35px 30px;
        }

        .form-group {
            margin-bottom: 22px;
        }

        label {
            display: block;
            font-size: 0.85rem;
            font-weight: 600;
            color: #555;
            margin-bottom: 8px;
            text-transform: uppercase;
            letter-spacing: 0.04em;
        }

        .input-wrapper {
            position: relative;
        }

        .input-icon {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            font-size: 1rem;
        }

        input {
            width: 100%;
            padding: 12px 14px 12px 40px;
            border: 2px solid #e8e8e8;
            border-radius: 10px;
            font-size: 0.95rem;
            font-family: 'Segoe UI', sans-serif;
            transition: border-color 0.2s, box-shadow 0.2s;
            outline: none;
            background: #fafafa;
        }

        input:focus {
            border-color: #667eea;
            box-shadow: 0 0 0 4px rgba(102,126,234,0.12);
            background: white;
        }

        input::placeholder { color: #bbb; }

        .btn-submit {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #667eea, #764ba2);
            color: white;
            border: none;
            border-radius: 10px;
            font-size: 1rem;
            font-weight: 700;
            cursor: pointer;
            transition: opacity 0.2s, transform 0.1s;
            margin-top: 8px;
            letter-spacing: 0.03em;
        }

        .btn-submit:hover { opacity: 0.92; }
        .btn-submit:active { transform: scale(0.98); }

        .divider {
            text-align: center;
            margin: 20px 0 0;
            font-size: 0.85rem;
            color: #aaa;
        }

        .divider a {
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
        }

        .divider a:hover { text-decoration: underline; }
    </style>
</head>
<body>

<header>
    <h1>🎓 Gestion des Étudiants</h1>
    <a href="index.php" class="btn-back">← Retour à la liste</a>
</header>

<div class="container">
    <div class="card">

        <div class="card-header">
            <div class="icon">🎓</div>
            <h2>Nouvel étudiant</h2>
            <p>Remplissez les informations ci-dessous</p>
        </div>

        <div class="card-body">
            <form action="../controllers/EtudiantController.php" method="POST">

                <div class="form-group">
                    <label for="nom">Nom</label>
                    <div class="input-wrapper">
                        <span class="input-icon">👤</span>
                        <input type="text" id="nom" name="nom" placeholder="Ex: Ben Ali" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="prenom">Prénom</label>
                    <div class="input-wrapper">
                        <span class="input-icon">✏️</span>
                        <input type="text" id="prenom" name="prenom" placeholder="Ex: Mohamed" required>
                    </div>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <div class="input-wrapper">
                        <span class="input-icon">📧</span>
                        <input type="email" id="email" name="email" placeholder="Ex: mohamed@email.com" required>
                    </div>
                </div>

                <button type="submit" name="add" class="btn-submit">
                    ✅ Ajouter l'étudiant
                </button>

            </form>

            <div class="divider">
                Vous avez fini ? <a href="index.php">Voir la liste</a>
            </div>
        </div>

    </div>
</div>

</body>
</html>