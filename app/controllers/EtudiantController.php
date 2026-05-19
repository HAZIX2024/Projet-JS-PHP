<?php

require_once __DIR__ . '/../Models/Etudiant.php';
require_once __DIR__ . '/../../config/database.php';

$etudiant = new Etudiant($pdo);

// ADD
if(isset($_POST['add'])) {

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];

    $etudiant->create($nom, $prenom, $email,$date_naissance);

    header("Location: ../views/index.php");
}

// DELETE
if(isset($_GET['delete'])) {

    $id = $_GET['delete'];

    $etudiant->delete($id);

    header("Location: ../views/index.php");
}
?>
