<?php

class Etudiant {

    private $pdo;

    public $id;
    public $nom;
    public $prenom;
    public $email;
    public $date_naissance;

    // Constructor
    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // =========================
    // CREATE (Ajouter étudiant)
    // =========================
    public function create($nom, $prenom, $email, $date_naissance) {

        $sql = "INSERT INTO etudiants (nom, prenom, email, date_naissance)
                VALUES (?, ?, ?, ?)";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            $nom,
            $prenom,
            $email,
            $date_naissance
        ]);
    }

    // =========================
    // READ ALL (Afficher tout)
    // =========================
    public function getAll() {

        $sql = "SELECT * FROM etudiants";

        $stmt = $this->pdo->query($sql);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // =========================
    // READ ONE (Afficher un étudiant)
    // =========================
    public function getById($id) {

        $sql = "SELECT * FROM etudiants WHERE id = ?";

        $stmt = $this->pdo->prepare($sql);

        $stmt->execute([$id]);

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // =========================
    // UPDATE (Modifier étudiant)
    // =========================
    public function update($id, $nom, $prenom, $email, $date_naissance) {

        $sql = "UPDATE etudiants
                SET nom=?, prenom=?, email=?, date_naissance=?
                WHERE id=?";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([
            $nom,
            $prenom,
            $email,
            $date_naissance,
            $id
        ]);
    }

    // =========================
    // DELETE (Supprimer étudiant)
    // =========================
    public function delete($id) {

        $sql = "DELETE FROM etudiants WHERE id = ?";

        $stmt = $this->pdo->prepare($sql);

        return $stmt->execute([$id]);
    }
}
?>