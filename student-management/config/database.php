<?php

$host = "localhost";
$user = "root";
$password = "";
$dbname = "student_management";

try {
    $pdo = new PDO("mysql:host=$host;charset=utf8mb4", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $pdo->exec("CREATE DATABASE IF NOT EXISTS `$dbname`");
    $pdo->exec("USE `$dbname`");

    $sql = "
    CREATE TABLE IF NOT EXISTS etudiants (
        id INT(11) NOT NULL AUTO_INCREMENT,
        nom VARCHAR(100) DEFAULT NULL,
        prenom VARCHAR(100) DEFAULT NULL,
        email VARCHAR(100) DEFAULT NULL,
        date_naissance DATE DEFAULT NULL,
        PRIMARY KEY (id)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

    CREATE TABLE IF NOT EXISTS matieres (
        id INT(11) NOT NULL AUTO_INCREMENT,
        nom_matiere VARCHAR(100) DEFAULT NULL,
        coefficient INT(11) DEFAULT NULL,
        PRIMARY KEY (id)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

    CREATE TABLE IF NOT EXISTS users (
        id INT(11) NOT NULL AUTO_INCREMENT,
        username VARCHAR(100) DEFAULT NULL,
        password VARCHAR(255) DEFAULT NULL,
        role VARCHAR(50) DEFAULT NULL,
        PRIMARY KEY (id)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

    CREATE TABLE IF NOT EXISTS notes (
        id INT(11) NOT NULL AUTO_INCREMENT,
        etudiant_id INT(11) DEFAULT NULL,
        matiere_id INT(11) DEFAULT NULL,
        note FLOAT DEFAULT NULL,
        PRIMARY KEY (id)
    ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
    ";

    $pdo->exec($sql);

    $checkAdmin = $pdo->prepare("SELECT COUNT(*) FROM users WHERE username = ?");
    $checkAdmin->execute(["admin"]);

    if ($checkAdmin->fetchColumn() == 0) {
        $insertAdmin = $pdo->prepare("INSERT INTO users (username, password, role) VALUES (?, ?, ?)");
        $insertAdmin->execute(["admin", "admin123", "admin"]);
    }

    echo '
    <style>
        .toast {
            position: fixed;
            bottom: 24px;
            right: 24px;
            background: #1a1a1a;
            color: #fff;
            padding: 12px 18px;
            border-radius: 8px;
            font-family: sans-serif;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 10px;
            box-shadow: 0 4px 16px rgba(0,0,0,0.25);
            border-left: 4px solid #22c55e;
            animation: slideIn 0.3s ease, fadeOut 0.5s ease 3s forwards;
        }
        .toast::before {
            content: "✓";
            color: #22c55e;
            font-weight: bold;
            font-size: 16px;
        }
        @keyframes slideIn {
            from { opacity: 0; transform: translateY(16px); }
            to   { opacity: 1; transform: translateY(0); }
        }
        @keyframes fadeOut {
            to { opacity: 0; transform: translateY(8px); }
        }
    </style>
    <div class="toast">Database and tables created successfully.</div>
    ';

} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}
