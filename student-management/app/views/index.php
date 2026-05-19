<?php
require_once __DIR__ . '/../Models/Etudiant.php';
require_once __DIR__ . '/../../config/database.php';

$etudiant = new Etudiant($pdo);
$students = $etudiant->getAll();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion Étudiants</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f0f2f5;
            color: #333;
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

        .btn {
            padding: 10px 20px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9rem;
            transition: all 0.2s;
        }

        .btn-white {
            background: white;
            color: #667eea;
        }

        .btn-white:hover { background: #f0f0f0; }

        .btn-danger {
            background: #ff4d4d;
            color: white;
            padding: 6px 14px;
            font-size: 0.8rem;
        }

        .btn-danger:hover { background: #cc0000; }

        .container {
            max-width: 1000px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.08);
            overflow: hidden;
        }

        .card-header {
            padding: 20px 30px;
            border-bottom: 1px solid #eee;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card-header span {
            font-size: 0.9rem;
            color: #888;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            background: #f8f9fa;
            padding: 14px 20px;
            text-align: left;
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: #888;
            border-bottom: 1px solid #eee;
        }

        td {
            padding: 14px 20px;
            border-bottom: 1px solid #f0f0f0;
            font-size: 0.95rem;
        }

        tr:last-child td { border-bottom: none; }

        tr:hover td { background: #fafafa; }

        .badge {
            background: #eef0ff;
            color: #667eea;
            padding: 4px 10px;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
        }

        .empty {
            text-align: center;
            padding: 60px;
            color: #aaa;
        }

        .empty p { margin-top: 10px; font-size: 0.95rem; }
    </style>
</head>
<body>

<header>
    <h1>🎓 Gestion des Étudiants</h1>
    <a href="add.php" class="btn btn-white">+ Ajouter un étudiant</a>
</header>

<div class="container">
    <div class="card">
        <div class="card-header">
            <strong>Liste des étudiants</strong>
            <span><?= count($students) ?> étudiant(s)</span>
        </div>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($students)): ?>
                <tr>
                    <td colspan="5">
                        <div class="empty">
                            <div style="font-size:2rem">📭</div>
                            <p>Aucun étudiant enregistré.</p>
                        </div>
                    </td>
                </tr>
                <?php else: ?>
                <?php foreach($students as $student): ?>
                <tr>
                    <td><span class="badge">#<?= $student['id'] ?></span></td>
                    <td><?= htmlspecialchars($student['nom']) ?></td>
                    <td><?= htmlspecialchars($student['prenom']) ?></td>
                    <td><?= htmlspecialchars($student['email']) ?></td>
                    <td>
                        <a href="../controllers/EtudiantController.php?delete=<?= $student['id'] ?>"
                           class="btn btn-danger"
                           onclick="return confirm('Supprimer cet étudiant ?')">
                            🗑 Supprimer
                        </a>
                    </td>
                </tr>
                <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>