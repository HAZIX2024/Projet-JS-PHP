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

    echo "Database and tables created successfully.";

} catch (PDOException $e) {
    die("Error: " . $e->getMessage());
}